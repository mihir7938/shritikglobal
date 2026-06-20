<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Services\UploadImageService;
use App\Services\UserService;
use App\Services\ProductService;
use App\Services\SubProductService;
use App\Services\CustomerService;
use App\Models\User;
use App\Models\Role;
use App\Models\Customer;
use DataTables;
use Carbon;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {

	private $imageService, $userService, $productService, $subProductService, $customerService;

    public function __construct(
        UploadImageService $imageService,
        UserService $userService,
        ProductService $productService,
        SubProductService $subProductService,
        CustomerService $customerService
    )
    {
        $this->imageService = $imageService;
        $this->userService = $userService;
        $this->productService = $productService;
        $this->subProductService = $subProductService;
        $this->customerService = $customerService;
    }

    public function index(Request $request)
    {
        $all_customers = Customer::count();
        $secureLoans = Customer::whereHas('subProducts', function ($q) {
            $q->where('type', 1);
        })->count();
        $unsecureLoans = Customer::whereHas('subProducts', function ($q) {
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
                'count' => Customer::where('loanStatus', $status)->count()
            ];
        }
        return view('admin.index')->with('all_customers', $all_customers)->with('secureLoans', $secureLoans)->with('unsecureLoans', $unsecureLoans)->with('statusCounts', $statusCounts);
    }
    public function products(Request $request)
    {
        $products = $this->productService->getAllProducts();
        return view('admin.products.index')->with('products', $products);
    }
    public function addProduct(Request $request)
    {
        return view('admin.products.add');
    }
    public function saveProduct(Request $request)
    {
        $data = $request->all();
        $data['name'] = $request->name;
        $this->productService->create($data);
        $request->session()->put('message', 'Product has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('admin.products');
    }
    public function editProduct(Request $request, $id)
    {
        try{
            $product = $this->productService->getProductById($id);
            if(!$product){
                throw new BadRequestException('Invalid Request id');
            }
            return view('admin.products.edit')->with('product', $product);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.products');
        }
    }
    public function updateProduct(Request $request)
    {
        try{
            $product = $this->productService->getProductById($request->id);
            if(!$product){
                throw new BadRequestException('Invalid Request id');
            }
            $data['name'] = $request->name;
            $this->productService->update($product, $data);
            $request->session()->put('message', 'Product has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.products');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.products');
        }
    }
    public function deleteProduct(Request $request, $id)
    {
        try{
            $product = $this->productService->getProductById($id);
            if(!$product){
                throw new BadRequestException('Invalid Request id.');
            }
            $this->productService->delete($product);
            $request->session()->put('message', 'Product has been deleted successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.products');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.products');
        }
    }
    public function subProducts(Request $request)
    {
        $sub_products = $this->subProductService->getAllSubProducts();
        return view('admin.sub_products.index')->with('sub_products', $sub_products);
    }
    public function addSubProduct(Request $request)
    {
        $products = $this->productService->getAllProducts();
        return view('admin.sub_products.add')->with('products', $products);
    }
    public function saveSubProduct(Request $request)
    {
        $data = $request->all();
        $data['product_id'] = $request->product_id;
        $data['name'] = $request->name;
        $data['type'] = $request->type;
        $data['status'] = $request->status;
        $this->subProductService->create($data);
        $request->session()->put('message', 'Sub Product has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('admin.subproducts');
    }
    public function editSubProduct(Request $request, $id)
    {
        try{
            $sub_products = $this->subProductService->getSubProductById($id);
            if(!$sub_products){
                throw new BadRequestException('Invalid Request id');
            }
            $products = $this->productService->getAllProducts();
            return view('admin.sub_products.edit')->with('sub_products', $sub_products)->with('products', $products);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.subproducts');
        }
    }
    public function updateSubProduct(Request $request)
    {
        try{
            $sub_products = $this->subProductService->getSubProductById($request->id);
            if(!$sub_products){
                throw new BadRequestException('Invalid Request id');
            }
            $data['product_id'] = $request->product_id;
            $data['name'] = $request->name;
            $data['type'] = $request->type;
            $data['status'] = $request->status;
            $this->subProductService->update($sub_products, $data);
            $request->session()->put('message', 'Sub Product has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.subproducts');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.subproducts');
        }
    }
    public function deleteSubProduct(Request $request, $id)
    {
        try{
            $sub_products = $this->subProductService->getSubProductById($id);
            if(!$sub_products){
                throw new BadRequestException('Invalid Request id.');
            }
            $this->subProductService->delete($sub_products);
            $request->session()->put('message', 'Sub Product has been deleted successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.subproducts');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.subproducts');
        }
    }
    public function getUsers()
    {
        $users = $this->userService->getAllUsers();
        return view('admin.users.index')->with('users', $users);
    }
    public function fetchUsers(Request $request)
    {
        $users = $this->userService->getUsersByFilter($request);
        return view('admin.users.result')->with('users', $users)->render();
    }
    public function addUser()
    {
        return view('admin.users.add');
    }
    public function saveUser(RegisterRequest $request)
    {
        $user = $this->userService->create($request);
        $request->session()->put('message', 'User has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('admin.users');
    }
    public function editUser(Request $request, $id)
    {
        try{
            $user = $this->userService->getUserById($id);
            if(!$user){
                throw new BadRequestException('Invalid Request id');
            }
            return view('admin.users.edit')->with('user', $user);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.users');
        }
    }
    public function updateUser(Request $request)
    {
        try{
            $user = $this->userService->getUserById($request->id);
            if(!$user){
                throw new BadRequestException('Invalid Request id');
            }
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['address'] = $request->address;
            $data['canAccessSecure'] = $request->has('secure') ? 1 : 0;
            $data['canAccessUnSecure'] = $request->has('unsecure') ? 1 : 0;
            $data['status'] = $request->active;
            $this->userService->update($user, $data);
            $request->session()->put('message', 'User has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.users');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.users');
        }
    }
    public function deleteUser(Request $request, $id)
    {
        try{
            $user = $this->userService->getUserById($id);
            if(!$user){
                throw new BadRequestException('Invalid Request id.');
            }
            $this->userService->delete($user);
            $request->session()->put('message', 'User has been deleted successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.users');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.users');
        }
    }
    private function customerQuery($request)
    {
         $query = Customer::with([
            'subProducts',
            'telecallers',
            'associates'
        ]);
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
                ->addColumn('action', function ($row) {
                    $btn = '<div class="text-center" style="min-width:100px">
                            <a href="'.route('admin.customers.edit',$row->id).'" class="btn btn-outline-primary btn-circle">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a href="'.route('admin.customers.edit',$row->id).'" class="btn btn-outline-danger btn-circle">
                                <i class="fas fa-trash"></i>
                            </a></div>';
                    return $btn;
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
        return view('admin.customers.index')->with('associates', $associates)->with('telecallers', $telecallers)->with('sub_products', $sub_products)->with('customers', $customers);
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
        $sub_products = $this->subProductService->getAllSubProducts();
        $associates = $this->userService->getUsersByRole(Role::ASSOCIATE_ROLE_ID);
        $telecallers = $this->userService->getUsersByRole(Role::TELECALLER_ROLE_ID);
        return view('admin.customers.add')->with('products', $products)->with('sub_products', $sub_products)->with('associates', $associates)->with('telecallers', $telecallers);
    }
}