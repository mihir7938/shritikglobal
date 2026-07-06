<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UploadImageService;
use App\Services\ProductService;
use App\Services\SubProductService;
use App\Services\TelecallerCallMasterService;
use App\Services\TelecallerFollowupLogService;
use App\Models\TelecallerCallMaster;
use App\Models\TelecallerFollowupLog;
use DataTables;
use Carbon;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Illuminate\Support\Facades\Auth;

class TelecallerController extends Controller
{
    private $imageService, $productService, $subProductService, $telecallerCallMasterService, $telecallerFollowupLogService;

    public function __construct (
        UploadImageService $imageService,
        ProductService $productService,
        SubProductService $subProductService,
        TelecallerCallMasterService $telecallerCallMasterService,
        TelecallerFollowupLogService $telecallerFollowupLogService
    )
    {
        $this->imageService = $imageService;
        $this->productService = $productService;
        $this->subProductService = $subProductService;
        $this->telecallerCallMasterService = $telecallerCallMasterService;
        $this->telecallerFollowupLogService = $telecallerFollowupLogService;
    }

    public function index(Request $request)
    {
        return view('telecallers.index');
    }

    private function callQuery($request)
    {
         $query = TelecallerCallMaster::with([
            'subProducts'
        ]);
        if($request->status){
            $query->where('status', $request->status);
        }
        if($request->sub_product){
            $query->where('sub_product_id', $request->sub_product);
        }
        if ($request->start_date && $request->end_date) {
            $start = \Carbon\Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d');
            $end = \Carbon\Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d');
            $query->whereBetween('last_followup_date', [$start, $end]);
        }
        return $query->where('created_by', Auth::user()->id)->orderBy('id', 'desc');
    }
    public function getCalls(Request $request)
    {
        if($request->ajax()){
            $data = $this->callQuery($request);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                    <div class="dropdown">
                        <button class="btn btn-outline-primary" type="button" data-toggle="dropdown"><i class="fas fa-list"></i></button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="'.route('telecallers.calls.edit',$row->id).'">
                                Edit
                            </a>
                            <a class="dropdown-item" href="'.route('telecallers.calls.delete',$row->id).'">
                                Delete
                            </a>
                            <a href="javascript:void(0)" class="dropdown-item openFollowUpModal" data-id="'.$row->id.'">
                                Add Follow Up
                            </a>
                            <a href="javascript:void(0)" class="dropdown-item openFollowUpLogModal" data-id="'.$row->id.'">
                                View Follow Up Logs
                            </a>
                        </div>
                    </div>';
                })
                ->addColumn('product_name', function($row){
                    return optional($row->subProducts)->name;
                })
                ->addColumn('last_followup_date', function($row){
                    return $row->last_followup_date ? Carbon\Carbon::parse($row->last_followup_date)->format('d M, Y') : '';
                })
                ->addColumn('closing_date', function($row){
                    return $row->closing_date ? Carbon\Carbon::parse($row->closing_date)->format('d M, Y h:i A') : '';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $sub_products = $this->subProductService->getAllSubProducts();
        $calls = TelecallerCallMaster::where('created_by', Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('telecallers.calls')->with('sub_products', $sub_products)->with('calls', $calls);
    }
    public function exportCallsCsv(Request $request)
    {
        $data = $this->callQuery($request)->get();
        $filename = 'calls_' . date('Ymd_His') . '.csv';
        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
        ];
        $callback = function () use ($data) {
            $file = fopen('php://output', 'w');
            fputcsv($file, [
                'Customer Name',
                'Customer Mobile',
                'Product Name',
                'Loan Amount',
                'Followup Date',
                'Followup Remarks',
                'Status',
                'Date of Closing',
                'Remarks'
            ]);
            foreach ($data as $row) {
                fputcsv($file, [
                    $row->customer_name,
                    $row->customer_mobile,
                    optional($row->subProducts)->name,
                    $row->loan_amount,
                    $row->last_followup_date ? \Carbon\Carbon::parse($row->last_followup_date)->format('d M, Y') : '',
                    $row->last_followup_remarks,
                    $row->status,
                    "\t" . ($row->closing_date ? \Carbon\Carbon::parse($row->closing_date)->format('d M, Y h:i A') : ''),
                    $row->remarks
                ]);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
    public function addCall()
    {
        $products = $this->productService->getAllProducts();
        $sub_products = $this->subProductService->getActiveSubProducts();
        return view('telecallers.add')->with('products', $products)->with('sub_products', $sub_products);
    }
    public function saveCall(Request $request)
    {
        $data = $request->all();
        $data['customer_name'] = $request->customer_name;
        $data['customer_mobile'] = $request->customer_mobile;
        $data['product_id'] = $request->product_id;
        $data['sub_product_id'] = $request->sub_product_id;
        $data['loan_amount'] = $request->loan_amount;
        $data['remarks'] = $request->remarks;
        $data['status'] = 'Open';
        $data['created_by'] = Auth::user()->id;
        $this->telecallerCallMasterService->create($data);
        $request->session()->put('message', 'New call added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('telecallers.calls');
    }
    public function editCall(Request $request, $id)
    {
        try{
            $call = $this->telecallerCallMasterService->getCallById($id);
            if(!$call){
                throw new BadRequestException('Invalid Request id');
            }
            $products = $this->productService->getAllProducts();
            $sub_products = $this->subProductService->getActiveSubProducts();
            return view('telecallers.edit')->with('call', $call)->with('products', $products)->with('sub_products', $sub_products);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('telecallers.calls');
        }
    }
    public function updateCall(Request $request)
    {
        try{
            $call = $this->telecallerCallMasterService->getCallById($request->id);
            if(!$call){
                throw new BadRequestException('Invalid Request id');
            }
            $data['customer_name'] = $request->customer_name;
            $data['customer_mobile'] = $request->customer_mobile;
            $data['product_id'] = $request->product_id;
            $data['sub_product_id'] = $request->sub_product_id;
            $data['loan_amount'] = $request->loan_amount;
            $data['remarks'] = $request->remarks;
            $data['status'] = $request->status;
            if($request->status == 'Closed') {
                $data['closing_date'] = date('Y-m-d H:i:s');
            } else {
                $data['closing_date'] = NULL;
            }
            $this->telecallerCallMasterService->update($call, $data);
            $request->session()->put('message', 'Call has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('telecallers.calls');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('telecallers.calls');
        }
    }
    public function deleteCall(Request $request, $id)
    {
        try{
            $call = $this->telecallerCallMasterService->getCallById($id);
            if(!$call){
                throw new BadRequestException('Invalid Request id');
            }
            $this->telecallerCallMasterService->delete($call);
            $request->session()->put('message', 'Call has been deleted successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('telecallers.calls');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('telecallers.calls');
        }
    }
    public function getCallDetails($id)
    {
        $call = TelecallerCallMaster::select(
            'id',
            'customer_name',
            'customer_mobile'
        )->findOrFail($id);
        return response()->json($call);
    }
    public function updateFollowup(Request $request)
    {
        $call = TelecallerCallMaster::findOrFail($request->call_id);
        $call->last_followup_date = date('Y-m-d', strtotime(strtr($request->followup_date, '/', '-')));
        $call->last_followup_remarks = $request->followup_remarks;
        $call->save();
        $data['call_id'] = $request->call_id;
        $data['followup_date'] = date('Y-m-d', strtotime(strtr($request->followup_date, '/', '-')));
        $data['followup_remarks'] = $request->followup_remarks;
        $this->telecallerFollowupLogService->create($data);
        return response()->json(['success' => true]);
    }
    public function getFollowupLogs($id)
    {
        $call = TelecallerCallMaster::findOrFail($id);
        $logs = TelecallerFollowupLog::where('call_id', $id)->orderBy('created_at', 'asc')->get();
        return view('telecallers.followup_logs')->with('call', $call)->with('logs', $logs);
    }
}