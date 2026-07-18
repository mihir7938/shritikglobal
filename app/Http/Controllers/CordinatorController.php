<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UploadImageService;
use App\Services\UserService;
use App\Services\ProductService;
use App\Services\SubProductService;
use App\Services\CustomerService;
use App\Services\StatusRemarkService;
use App\Services\CustomerBankService;
use App\Models\User;
use App\Models\Role;
use App\Models\Customer;
use App\Models\StatusRemark;
use App\Models\CustomerBank;
use DataTables;
use Carbon;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Illuminate\Support\Facades\Auth;

class CordinatorController extends Controller
{
    private $imageService, $userService, $productService, $subProductService, $customerService, $statusRemarkService, $customerBankService;

    public function __construct (
        UploadImageService $imageService,
        UserService $userService,
        ProductService $productService,
        SubProductService $subProductService,
        CustomerService $customerService,
        StatusRemarkService $statusRemarkService,
        CustomerBankService $customerBankService
    )
    {
        $this->imageService = $imageService;
        $this->userService = $userService;
        $this->productService = $productService;
        $this->subProductService = $subProductService;
        $this->customerService = $customerService;
        $this->statusRemarkService = $statusRemarkService;
        $this->customerBankService = $customerBankService;
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $baseQuery = Customer::query();
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
        $all_customers = (clone $baseQuery)->count();
        $secureLoans = (clone $baseQuery)->whereHas('subProducts', function ($q) {
            $q->where('type', 1);
        })->count();
        $unsecureLoans = (clone $baseQuery)->whereHas('subProducts', function ($q) {
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
                'count' => (clone $baseQuery)->where('loanStatus', $status)->count()
            ];
        }
        return view('cordinators.index')->with('all_customers', $all_customers)->with('secureLoans', $secureLoans)->with('unsecureLoans', $unsecureLoans)->with('statusCounts', $statusCounts);
    }
    private function customerQuery($request)
    {
        $user = Auth::user();
        $query = Customer::with([
            'subProducts',
            'telecallers',
            'associates'
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
        if($request->associate){
            $query->where('associateId', $request->associate);
        }
        if($request->telecaller){
            $query->where('telecallerId', $request->telecaller);
        }
        if($request->sub_product){
            $query->where('subProductId', $request->sub_product);
        }
        if ($request->start_date && $request->end_date) {
            $start = \Carbon\Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d');
            $end = \Carbon\Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d');
            $query->whereBetween('doj', [$start, $end]);
        }
        return $query->orderBy('doj', 'desc');
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
                            <a class="dropdown-item" href="'.route('cordinators.customers.edit',$row->id).'">
                                Edit
                            </a>
                            <a class="dropdown-item" href="'.route('cordinators.customers.delete',$row->id).'">
                                Delete
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
                ->addColumn('telecaller_name', function($row){
                    return optional($row->telecallers)->name;
                })
                ->addColumn('associate_name', function($row){
                    return optional($row->associates)->name;
                })
                ->addColumn('joining_date', function($row){
                    return $row->doj ? Carbon\Carbon::parse($row->doj)->format('d M, Y') : '';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $associates = $this->userService->getUsersByRole(Role::ASSOCIATE_ROLE_ID);
        $telecallers = $this->userService->getUsersByRole(Role::TELECALLER_ROLE_ID);
        $sub_products = $this->subProductService->getAllSubProducts();
        $customers = $this->customerService->getAllCustomers();
        return view('cordinators.customers')->with('associates', $associates)->with('telecallers', $telecallers)->with('sub_products', $sub_products)->with('customers', $customers);
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
                'Telecaller Name',
                'Associate Name',
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
                    optional($row->telecallers)->name,
                    optional($row->associates)->name,
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
        $associates = $this->userService->getUsersByRole(Role::ASSOCIATE_ROLE_ID);
        $telecallers = $this->userService->getUsersByRole(Role::TELECALLER_ROLE_ID);
        return view('cordinators.add')->with('products', $products)->with('sub_products', $sub_products)->with('associates', $associates)->with('telecallers', $telecallers);
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
        $data['associateId'] = '';
        if($request->associateId) {
            $data['associateId'] = $request->associateId;
        }
        $data['telecallerId'] = $request->telecallerId;
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
        return redirect()->route('cordinators.customers');
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
            $associates = $this->userService->getUsersByRole(Role::ASSOCIATE_ROLE_ID);
            $telecallers = $this->userService->getUsersByRole(Role::TELECALLER_ROLE_ID);
            return view('cordinators.edit')->with('customer', $customer)->with('products', $products)->with('sub_products', $sub_products)->with('associates', $associates)->with('telecallers', $telecallers);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('cordinators.customers');
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
            $data['associateId'] = '';
            if($request->associateId) {
                $data['associateId'] = $request->associateId;
            }
            $data['telecallerId'] = $request->telecallerId;
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
            return redirect()->route('cordinators.customers');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('cordinators.customers');
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
            return redirect()->route('cordinators.customers');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('cordinators.customers');
        }
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
        return view('cordinators.status_logs')->with('customer', $customer)->with('logs', $logs);
    }
    public function getBankLogs($id)
    {
        $customer = Customer::findOrFail($id);
        $logs = CustomerBank::where('customer_id', $id)->orderBy('created_at', 'asc')->get();
        return view('cordinators.bank_logs')->with('customer', $customer)->with('logs', $logs);
    }
}