<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UploadImageService;
use App\Services\ProductService;
use App\Services\SubProductService;
use App\Services\CustomerService;
use App\Services\StatusRemarkService;
use App\Services\CustomerBankService;
use App\Services\TelecallerCallMasterService;
use App\Services\TelecallerFollowupLogService;
use App\Models\User;
use App\Models\Role;
use App\Models\Customer;
use App\Models\StatusRemark;
use App\Models\CustomerBank;
use App\Models\TelecallerCallMaster;
use App\Models\TelecallerFollowupLog;
use DataTables;
use Carbon;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Illuminate\Support\Facades\Auth;

class TelecallerController extends Controller
{
    private $imageService, $productService, $subProductService, $customerService, $statusRemarkService, $customerBankService, $telecallerCallMasterService, $telecallerFollowupLogService;

    public function __construct (
        UploadImageService $imageService,
        ProductService $productService,
        SubProductService $subProductService,
        CustomerService $customerService,
        StatusRemarkService $statusRemarkService,
        CustomerBankService $customerBankService,
        TelecallerCallMasterService $telecallerCallMasterService,
        TelecallerFollowupLogService $telecallerFollowupLogService
    )
    {
        $this->imageService = $imageService;
        $this->productService = $productService;
        $this->subProductService = $subProductService;
        $this->customerService = $customerService;
        $this->statusRemarkService = $statusRemarkService;
        $this->customerBankService = $customerBankService;
        $this->telecallerCallMasterService = $telecallerCallMasterService;
        $this->telecallerFollowupLogService = $telecallerFollowupLogService;
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $baseQuery = TelecallerCallMaster::where('created_by', $user->id);
        if ($user->canAccessSecure && !$user->canAccessUnSecure) {
            $baseQuery->whereHas('subProducts', function ($q) {
                $q->where('type', 1);
            });
        } elseif (!$user->canAccessSecure && $user->canAccessUnSecure) {
            $baseQuery->whereHas('subProducts', function ($q) {
                $q->where('type', 0);
            });
        } elseif (!$user->canAccessSecure && !$user->canAccessUnSecure) {
            $baseQuery->whereNull('id');
        }
        $total_calls = (clone $baseQuery)->count();
        $total_open_calls = (clone $baseQuery)->where('status', 'Open')->count();
        $total_closed_calls = (clone $baseQuery)->where('status', 'Closed')->count();
        $secureLoans = (clone $baseQuery)->whereHas('subProducts', function ($q) {
            $q->where('type', 1);
        })->count();
        $unsecureLoans = (clone $baseQuery)->whereHas('subProducts', function ($q) {
            $q->where('type', 0);
        })->count();
        $baseQueryCust = Customer::where('telecallerId', $user->username);
        if ($user->canAccessSecure && !$user->canAccessUnSecure) {
            $baseQueryCust->whereHas('subProducts', function ($q) {
                $q->where('type', 1);
            });
        } elseif (!$user->canAccessSecure && $user->canAccessUnSecure) {
            $baseQueryCust->whereHas('subProducts', function ($q) {
                $q->where('type', 0);
            });
        } elseif (!$user->canAccessSecure && !$user->canAccessUnSecure) {
            $baseQueryCust->whereNull('id');
        }
        $all_customers = (clone $baseQueryCust)->count();
        $secureLoansCust = (clone $baseQueryCust)->whereHas('subProducts', function ($q) {
            $q->where('type', 1);
        })->count();
        $unsecureLoansCust = (clone $baseQueryCust)->whereHas('subProducts', function ($q) {
            $q->where('type', 0);
        })->count();
        $loanStatuses = [
            'Office',
            'Forward to Bank',
            'Login',
            'PD/Visit',
            'Sanction',
            'Agreement',
            'Disbursement',
            'Closed',
            'Reject',
            'Return'
        ];
        $statusCounts = [];
        foreach ($loanStatuses as $status) {
            $statusCounts[] = [
                'name' => $status,
                'count' => (clone $baseQueryCust)->where('loanStatus', $status)->count()
            ];
        }
        return view('telecallers.index')->with('total_calls', $total_calls)->with('total_open_calls', $total_open_calls)->with('total_closed_calls', $total_closed_calls)->with('secureLoans', $secureLoans)->with('unsecureLoans', $unsecureLoans)->with('all_customers', $all_customers)->with('secureLoansCust', $secureLoansCust)->with('unsecureLoansCust', $unsecureLoansCust)->with('statusCounts', $statusCounts);
    }
    private function customerQuery($request)
    {
        $user = Auth::user();
        $query = Customer::with([
            'subProducts'
        ]);
        $query->whereHas('subProducts', function ($q) use ($user) {
            if ($user->canAccessSecure && !$user->canAccessUnSecure) {
                $q->where('type', 1);
            } elseif (!$user->canAccessSecure && $user->canAccessUnSecure) {
                $q->where('type', 0);
            } elseif (!$user->canAccessSecure && !$user->canAccessUnSecure) {
                $q->whereNull('id');
            }
        });
        if ($request->type != '') {
            $query->whereHas('subProducts', function ($q) use ($request) {
                $q->where('type', $request->type);
            });
        }
        if($request->status){
            $query->where('loanStatus', $request->status);
        }
        if($request->sub_product){
            $query->where('subProductId', $request->sub_product);
        }
        if ($request->start_date && $request->end_date) {
            $start = \Carbon\Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d');
            $end = \Carbon\Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d');
            $query->whereBetween('doj', [$start, $end]);
        }
        return $query->where('telecallerId', Auth::user()->username)->orderBy('doj', 'desc');
    }
    public function getCustomers(Request $request)
    {
        if($request->ajax()){
            $data = $this->customerQuery($request);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                    <div class="dropdown">
                        <button class="btn btn-outline-primary" type="button" data-toggle="dropdown"><i class="fas fa-list"></i></button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="'.route('telecallers.customers.edit',$row->id).'">
                                Edit
                            </a>
                            <a class="dropdown-item" href="'.route('telecallers.customers.delete',$row->id).'">
                                Delete
                            </a>
                            <a href="javascript:void(0)" class="dropdown-item openPrintWindow" data-id="'.$row->id.'">
                                Print
                            </a>
                            <a href="javascript:void(0)" class="dropdown-item openStatusModal" data-id="'.$row->id.'">
                                Change Status
                            </a>
                            <a href="javascript:void(0)" class="dropdown-item openStatusLogModal" data-id="'.$row->id.'">
                                View Status Logs
                            </a>
                            <a href="javascript:void(0)" class="dropdown-item openBankModal" data-id="'.$row->id.'">
                                File Transfer To Bank
                            </a>
                            <a href="javascript:void(0)" class="dropdown-item openBankLogModal" data-id="'.$row->id.'">
                                Banks List
                            </a>
                        </div>
                    </div>';
                })
                ->addColumn('product_name', function($row){
                    return optional($row->subProducts)->name;
                })
                ->addColumn('joining_date', function($row){
                    return $row->doj ? Carbon\Carbon::parse($row->doj)->format('d M, Y') : '';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $sub_products = $this->subProductService->getAllSubProducts();
        $customers = $this->customerService->getAllCustomers();
        return view('telecallers.customers')->with('sub_products', $sub_products)->with('customers', $customers);
    }
    public function exportCustomersCsv(Request $request)
    {
        $data = $this->customerQuery($request)->get();
        $filename = 'customers_' . date('Ymd_His') . '.csv';
        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
        ];
        $callback = function () use ($data) {
            $file = fopen('php://output', 'w');
            fputcsv($file, [
                'Name',
                'Mobile',
                'Product',
                'Loan Amount',
                'Profession Type',
                'Profession Details',
                'Bank',
                'Contact Person',
                'Loan Status',
                'Status Remarks',
                'Address',
                'Joining Date',
                'Bank Remarks'
            ]);
            foreach ($data as $row) {
                fputcsv($file, [
                    $row->fullName,
                    $row->mobile,
                    optional($row->subProducts)->name,
                    $row->loanAmount,
                    $row->profession_type,
                    $row->profession_details,
                    $row->bankName,
                    $row->bankAssocName,
                    $row->loanStatus,
                    $row->loanStatusRemark,
                    $row->res_address,
                    $row->doj ? \Carbon\Carbon::parse($row->doj)->format('d M, Y') : '',
                    $row->bankRemarks
                ]);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
    public function addCustomer()
    {
        $products = $this->productService->getAllProducts();
        $sub_products = $this->subProductService->getActiveSubProducts();
        return view('telecallers.add_customers')->with('products', $products)->with('sub_products', $sub_products);
    }
    public function saveCustomer(Request $request)
    {
        $data = $request->all();
        $lastFourDigits = substr($request->mobile, -4);
        $custname = "SGCT".$lastFourDigits;
        if (Customer::where('customerId', $custname)->exists()) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'phone' => ['This phone number generates a customer id that already exists.'],
            ]);
        }
        $data['customerId'] = $custname;
        $data['productId'] = $request->productId;
        $data['subProductId'] = $request->subProductId;
        $data['loanAmount'] = $request->loanAmount;
        $data['telecallerId'] = Auth::user()->username;
        $data['fullName'] = $request->fullName;
        $data['surName'] = $request->surName;
        $data['motherName'] = $request->motherName;
        if($request->dob) {
            $data['dob'] = date('Y-m-d', strtotime(strtr($request->dob, '/', '-')));
        }
        $data['gender'] = $request->gender;
        $data['mobile'] = $request->mobile;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['profession_type'] = $request->profession_type;
        $data['job_type'] = $request->job_type;
        $data['profession_details'] = $request->profession_details;
        $data['marital'] = $request->marital;
        $data['alt_mobile'] = $request->alt_mobile;
        $data['res_address'] = $request->res_address;
        $data['res_landmark'] = $request->res_landmark;
        $data['res_city'] = $request->res_city;
        $data['res_state'] = $request->res_state;
        $data['res_pincode'] = $request->res_pincode;
        $data['prop_address'] = $request->prop_address;
        $data['prop_landmark'] = $request->prop_landmark;
        $data['prop_city'] = $request->prop_city;
        $data['prop_state'] = $request->prop_state;
        $data['prop_pincode'] = $request->prop_pincode;
        $data['co_fullname'] = $request->co_fullname;
        $data['co_relation'] = $request->co_relation;
        if($request->co_dob) {
            $data['co_dob'] = date('Y-m-d', strtotime(strtr($request->co_dob, '/', '-')));
        }
        $data['co_mobile'] = $request->co_mobile;
        $data['co_profession_type'] = $request->co_profession_type;
        $data['co_job_type'] = $request->co_job_type;
        $data['co_profession_details'] = $request->co_profession_details;
        $data['aadhar'] = $request->aadhar;
        $data['pan'] = $request->pan;
        if($request->doj) {
            $data['doj'] = date('Y-m-d', strtotime(strtr($request->doj, '/', '-')));
        }
        if($request->has('aadharImage')){
            $aadhar = $this->imageService->uploadFile($request->aadharImage, "assets/aadhar");
            $data['aadharImage'] = '/aadhar/'.$aadhar;
        }
        if($request->has('panImage')){
            $pan = $this->imageService->uploadFile($request->panImage, "assets/pan");
            $data['panImage'] = '/pan/'.$pan;
        }
        if($request->has('customerImage')){
            $customer = $this->imageService->uploadFile($request->customerImage, "assets/customer");
            $data['customerImage'] = '/customer/'.$customer;
        }
        $data['active_status'] = 1;
        $data['createdBy'] = Auth::user()->username;
        $data['noOfDependent'] = $request->noOfDependent;
        $data['isOwned'] = $request->isOwned;
        $data['customerBankName'] = $request->customerBankName;
        $data['isSavingsAccount'] = $request->isSavingsAccount;
        if($request->has('bankDocumentPath')){
            $bank = $this->imageService->uploadFile($request->bankDocumentPath, "assets/bank");
            $data['bankDocumentPath'] = '/bank/'.$bank;
        }
        if($request->has('resPropertyTaxDoc')){
            $property = $this->imageService->uploadFile($request->resPropertyTaxDoc, "assets/property");
            $data['resPropertyTaxDoc'] = '/property/'.$property;
        }
        if($request->has('resLightBillDoc')){
            $lightbill = $this->imageService->uploadFile($request->resLightBillDoc, "assets/lightbill");
            $data['resLightBillDoc'] = '/lightbill/'.$lightbill;
        }
        $this->customerService->create($data);
        $request->session()->put('message', 'Customer has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('telecallers.customers');
    }
    public function editCustomer(Request $request, $id)
    {
        try{
            $customer = $this->customerService->getCustomerById($id);
            if(!$customer){
                throw new BadRequestException('Invalid Request id');
            }
            $products = $this->productService->getAllProducts();
            $sub_products = $this->subProductService->getActiveSubProducts();
            return view('telecallers.edit_customers')->with('customer', $customer)->with('products', $products)->with('sub_products', $sub_products);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('telecallers.customers');
        }
    }
    public function updateCustomer(Request $request)
    {
        try{
            $customer = $this->customerService->getCustomerById($request->id);
            if(!$customer){
                throw new BadRequestException('Invalid Request id');
            }
            $data['productId'] = $request->productId;
            $data['subProductId'] = $request->subProductId;
            $data['loanAmount'] = $request->loanAmount;
            $data['fullName'] = $request->fullName;
            $data['surName'] = $request->surName;
            $data['motherName'] = $request->motherName;
            if($request->dob) {
                $data['dob'] = date('Y-m-d', strtotime(strtr($request->dob, '/', '-')));
            }
            $data['gender'] = $request->gender;
            $data['phone'] = $request->phone;
            $data['email'] = $request->email;
            $data['profession_type'] = $request->profession_type;
            $data['job_type'] = $request->job_type;
            $data['profession_details'] = $request->profession_details;
            $data['marital'] = $request->marital;
            $data['alt_mobile'] = $request->alt_mobile;
            $data['res_address'] = $request->res_address;
            $data['res_landmark'] = $request->res_landmark;
            $data['res_city'] = $request->res_city;
            $data['res_state'] = $request->res_state;
            $data['res_pincode'] = $request->res_pincode;
            $data['prop_address'] = $request->prop_address;
            $data['prop_landmark'] = $request->prop_landmark;
            $data['prop_city'] = $request->prop_city;
            $data['prop_state'] = $request->prop_state;
            $data['prop_pincode'] = $request->prop_pincode;
            $data['co_fullname'] = $request->co_fullname;
            $data['co_relation'] = $request->co_relation;
            if($request->co_dob) {
                $data['co_dob'] = date('Y-m-d', strtotime(strtr($request->co_dob, '/', '-')));
            }
            $data['co_mobile'] = $request->co_mobile;
            $data['co_profession_type'] = $request->co_profession_type;
            $data['co_job_type'] = $request->co_job_type;
            $data['co_profession_details'] = $request->co_profession_details;
            $data['aadhar'] = $request->aadhar;
            $data['pan'] = $request->pan;
            if($request->doj) {
                $data['doj'] = date('Y-m-d', strtotime(strtr($request->doj, '/', '-')));
            }
            if($request->has('aadharImage')){
                $aadharpath = public_path('assets/' . $customer->aadharImage);
                $this->imageService->deleteFile($aadharpath);
                $aadhar = $this->imageService->uploadFile($request->aadharImage, "assets/aadhar");
                $data['aadharImage'] = '/aadhar/'.$aadhar;
            }
            if($request->has('panImage')){
                $panpath = public_path('assets/' . $customer->panImage);
                $this->imageService->deleteFile($panpath);
                $pan = $this->imageService->uploadFile($request->panImage, "assets/pan");
                $data['panImage'] = '/pan/'.$pan;
            }
            if($request->has('customerImage')){
                $customerpath = public_path('assets/' . $customer->customerImage);
                $this->imageService->deleteFile($customerpath);
                $customerfile = $this->imageService->uploadFile($request->customerImage, "assets/customer");
                $data['customerImage'] = '/customer/'.$customerfile;
            }
            $data['noOfDependent'] = $request->noOfDependent;
            $data['isOwned'] = $request->isOwned;
            $data['customerBankName'] = $request->customerBankName;
            $data['isSavingsAccount'] = $request->isSavingsAccount;
            if($request->has('bankDocumentPath')){
                $bankpath = public_path('assets/' . $customer->bankDocumentPath);
                $this->imageService->deleteFile($bankpath);
                $bank = $this->imageService->uploadFile($request->bankDocumentPath, "assets/bank");
                $data['bankDocumentPath'] = '/bank/'.$bank;
            }
            if($request->has('resPropertyTaxDoc')){
                $taxpath = public_path('assets/' . $customer->resPropertyTaxDoc);
                $this->imageService->deleteFile($taxpath);
                $property = $this->imageService->uploadFile($request->resPropertyTaxDoc, "assets/property");
                $data['resPropertyTaxDoc'] = '/property/'.$property;
            }
            if($request->has('resLightBillDoc')){
                $billpath = public_path('assets/' . $customer->resLightBillDoc);
                $this->imageService->deleteFile($billpath);
                $lightbill = $this->imageService->uploadFile($request->resLightBillDoc, "assets/lightbill");
                $data['resLightBillDoc'] = '/lightbill/'.$lightbill;
            }
            $this->customerService->update($customer, $data);
            $request->session()->put('message', 'Customer has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('telecallers.customers');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('telecallers.customers');
        }
    }
    public function deleteCustomer(Request $request, $id)
    {
        try{
            $customer = $this->customerService->getCustomerById($id);
            if(!$customer){
                throw new BadRequestException('Invalid Request id');
            }
            $this->customerService->delete($customer);
            $request->session()->put('message', 'Customer has been deleted successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('telecallers.customers');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('telecallers.customers');
        }
    }
    public function printCustomer($id)
    {
        $customer = Customer::with([
            'subProducts',
            'product',
        ])->findOrFail($id);
        return view('telecallers.print', compact('customer'));
    }
    public function getCustomerDetails($id)
    {
        $customer = Customer::select(
            'id',
            'fullName',
            'mobile',
            'loanStatus'
        )->findOrFail($id);
        return response()->json($customer);
    }
    public function updateStatus(Request $request)
    {
        $customer = Customer::findOrFail($request->customer_id);
        $customer->loanStatus = $request->modal_status;
        $customer->loanStatusRemark = $request->loanStatusRemark;
        $customer->save();
        $data['customer_id'] = $request->customer_id;
        $data['customerId'] = $customer->customerId;
        $data['status'] = $request->modal_status;
        $data['remarks'] = $request->loanStatusRemark;
        $this->statusRemarkService->create($data);
        return response()->json(['success' => true]);
    }
    public function updateBank(Request $request)
    {
        $customer = Customer::findOrFail($request->customer_id);
        $customer->bankName = $request->bankName;
        $customer->bankAssocName = $request->bankAssocName;
        $customer->bankAssocMobile = $request->bankAssocMobile;
        $customer->bankUpdateDate = date('Y-m-d', strtotime(strtr($request->bankUpdateDate, '/', '-')));
        $customer->bankRemarks = $request->bankRemarks;
        $customer->save();
        $data['customer_id'] = $request->customer_id;
        $data['customerId'] = $customer->customerId;
        $data['customerName'] = $customer->fullName;
        $data['bankName'] = $request->bankName;
        $data['bankAssocName'] = $request->bankAssocName;
        $data['bankAssocMobile'] = $request->bankAssocMobile;
        $data['bankUpdateDate'] = date('Y-m-d', strtotime(strtr($request->bankUpdateDate, '/', '-')));
        $data['bankRemarks'] = $request->bankRemarks;
        $this->customerBankService->create($data);
        return response()->json(['success' => true]);
    }
    public function getStatusLogs($id)
    {
        $customer = Customer::findOrFail($id);
        $logs = StatusRemark::where('customer_id', $id)->orderBy('created_at', 'asc')->get();
        return view('telecallers.status_logs')->with('customer', $customer)->with('logs', $logs);
    }
    public function getBankLogs($id)
    {
        $customer = Customer::findOrFail($id);
        $logs = CustomerBank::where('customer_id', $id)->orderBy('created_at', 'asc')->get();
        return view('telecallers.bank_logs')->with('customer', $customer)->with('logs', $logs);
    }
    private function callQuery($request)
    {
        $user = Auth::user();
        $query = TelecallerCallMaster::with([
            'subProducts'
        ]);
        $query->whereHas('subProducts', function ($q) use ($user) {
            if ($user->canAccessSecure && !$user->canAccessUnSecure) {
                $q->where('type', 1);
            } elseif (!$user->canAccessSecure && $user->canAccessUnSecure) {
                $q->where('type', 0);
            } elseif (!$user->canAccessSecure && !$user->canAccessUnSecure) {
                $q->whereNull('id');
            }
        });
        if ($request->type != '') {
            $query->whereHas('subProducts', function ($q) use ($request) {
                $q->where('type', $request->type);
            });
        }
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