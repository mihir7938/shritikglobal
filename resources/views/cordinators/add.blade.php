@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Customers</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('cordinators.customers.add.save')}}" class="form" id="add-customers-form" enctype="multipart/form-data">
                        @csrf
                        @include('shared.alert')
                        @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Customer</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="productId">Product*</label>
                                            <select id="productId" name="productId" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="subProductId">Sub Product*</label>
                                            <select id="subProductId" name="subProductId" class="form-control select2">
                                                <option value="">Select</option>
                                                @foreach($sub_products as $sub_product)
                                                    <option value="{{$sub_product->id}}">{{$sub_product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="loanAmount">Expt Loan Amount*</label>
                                            <input type="text" class="form-control" id="loanAmount" name="loanAmount" placeholder="Expt Loan Amount">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="associateId">Associate</label>
                                            <select id="associateId" name="associateId" class="form-control select2">
                                                <option value="">Select</option>
                                                @foreach($associates as $associate)
                                                    <option value="{{$associate->username}}">{{$associate->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="telecallerId">Telecaller</label>
                                            <select id="telecallerId" name="telecallerId" class="form-control select2">
                                                <option value="">Select</option>
                                                @foreach($telecallers as $telecaller)
                                                    <option value="{{$telecaller->username}}">{{$telecaller->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center my-3">
                                    <div class="flex-grow-1 border-bottom border-primary"></div>
                                        <h6 class="text-nowrap text-primary text-uppercase border border-primary d-inline-block px-3 py-1 m-0">Personal Details</h6>
                                    <div class="flex-grow-1 border-bottom border-primary"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fullName">Applicant Full Name*</label>
                                            <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Applicant Full Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="customerImage">Upload Applicant Image</label>
                                            <div class="input-group image_div">
                                                <div class="custom-file">             
                                                    <input type="file" class="custom-file-input" id="customerImage" name="customerImage">
                                                    <label class="custom-file-label" for="customerImage">Choose file</label>
                                                </div>              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="surName">Father/Husband Name</label>
                                            <input type="text" class="form-control" id="surName" name="surName" placeholder="Father/Husband Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="motherName">Mother Name</label>
                                            <input type="text" class="form-control" id="motherName" name="motherName" placeholder="Mother Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mobile">Mobile*</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="alt_mobile">Alternate Mobile</label>
                                            <input type="text" class="form-control" id="alt_mobile" name="alt_mobile" placeholder="Alternate Mobile">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date of Joining</label>
                                            <input type="text" class="form-control" id="doj" name="doj" placeholder="Date of Joining">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="text" class="form-control" id="dob" name="dob" placeholder="Date of Birth">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <div class="group">
                                                <input type="radio" id="male" name="gender" value="Male" checked>
                                                <label for="male">Male</label>
                                                <span class="mx-2"></span>
                                                <input type="radio" id="female" name="gender" value="Female">
                                                <label for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="marital">Marital Status</label>
                                            <div class="group">
                                                <input type="radio" id="married" name="marital" value="Married" checked>
                                                <label for="married">Married</label>
                                                <span class="mx-2"></span>
                                                <input type="radio" id="unmarried" name="marital" value="Unmarried">
                                                <label for="unmarried">Unmarried</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="noOfDependent">No of Dependent</label>
                                            <input type="text" class="form-control" id="noOfDependent" name="noOfDependent" placeholder="No of Dependent">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center my-3">
                                    <div class="flex-grow-1 border-bottom border-primary"></div>
                                        <h6 class="text-nowrap text-primary text-uppercase border border-primary d-inline-block px-3 py-1 m-0">Bank Details</h6>
                                    <div class="flex-grow-1 border-bottom border-primary"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="customerBankName">Bank Name</label>
                                            <input type="text" class="form-control" id="customerBankName" name="customerBankName" placeholder="Bank Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="isSavingsAccount">Account Type</label>
                                            <div class="group">
                                                <input type="radio" id="savings" name="isSavingsAccount" value="1">
                                                <label for="savings">Savings</label>
                                                <span class="mx-2"></span>
                                                <input type="radio" id="current" name="isSavingsAccount" value="0">
                                                <label for="current">Current</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bankDocumentPath">Bank PDF</label>
                                            <div class="input-group pdf_div">
                                                <div class="custom-file">             
                                                    <input type="file" class="custom-file-input" id="bankDocumentPath" name="bankDocumentPath">
                                                    <label class="custom-file-label" for="bankDocumentPath">Choose file</label>
                                                </div>              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center my-3">
                                    <div class="flex-grow-1 border-bottom border-primary"></div>
                                        <h6 class="text-nowrap text-primary text-uppercase border border-primary d-inline-block px-3 py-1 m-0">Profession</h6>
                                    <div class="flex-grow-1 border-bottom border-primary"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="profession_type">Profession Type</label>
                                            <div class="group">
                                                <input type="radio" id="job" name="profession_type" value="Job" checked>
                                                <label for="job">Job</label>
                                                <span class="mx-2"></span>
                                                <input type="radio" id="business" name="profession_type" value="Business">
                                                <label for="business">Business</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="job_type_div">
                                        <div class="form-group">
                                            <label for="job_type">Job Type</label>
                                            <div class="group">
                                                <input type="radio" id="salary_account" name="job_type" value="Salary Account" checked>
                                                <label for="salary_account">Salary Account</label>
                                                <span class="mx-2"></span>
                                                <input type="radio" id="cash_account" name="job_type" value="Cash Account">
                                                <label for="cash_account">Cash Account</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="profession_details">Profession Details</label>
                                            <textarea class="form-control" id="profession_details" name="profession_details" rows="4" cols="50" placeholder="Profession Details"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center my-3">
                                    <div class="flex-grow-1 border-bottom border-primary"></div>
                                        <h6 class="text-nowrap text-primary text-uppercase border border-primary d-inline-block px-3 py-1 m-0">Address (Residential)</h6>
                                    <div class="flex-grow-1 border-bottom border-primary"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="res_address">Postal Address</label>
                                            <input type="text" class="form-control" id="res_address" name="res_address" placeholder="Postal Address">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="res_landmark">Landmark</label>
                                            <input type="text" class="form-control" id="res_landmark" name="res_landmark" placeholder="Landmark">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="res_city">City</label>
                                            <input type="text" class="form-control" id="res_city" name="res_city" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="res_state">State</label>
                                            <input type="text" class="form-control" id="res_state" name="res_state" placeholder="State">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="res_pincode">Zip</label>
                                            <input type="text" class="form-control" id="res_pincode" name="res_pincode" placeholder="Zip">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="isOwned">Property Type</label>
                                            <div class="group">
                                                <input type="radio" id="owned" name="isOwned" value="true">
                                                <label for="owned">Owned</label>
                                                <span class="mx-2"></span>
                                                <input type="radio" id="rented" name="isOwned" value="false">
                                                <label for="rented">Rented</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="resPropertyTaxDoc">Property Tax</label>
                                            <div class="input-group tax_div">
                                                <div class="custom-file">             
                                                    <input type="file" class="custom-file-input" id="resPropertyTaxDoc" name="resPropertyTaxDoc">
                                                    <label class="custom-file-label" for="resPropertyTaxDoc">Choose file</label>
                                                </div>              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="resLightBillDoc">Light Bill</label>
                                            <div class="input-group bill_div">
                                                <div class="custom-file">             
                                                    <input type="file" class="custom-file-input" id="resLightBillDoc" name="resLightBillDoc">
                                                    <label class="custom-file-label" for="resLightBillDoc">Choose file</label>
                                                </div>              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center my-3">
                                    <div class="flex-grow-1 border-bottom border-primary"></div>
                                        <h6 class="text-nowrap text-primary text-uppercase border border-primary d-inline-block px-3 py-1 m-0">Address (Property)</h6>
                                    <div class="flex-grow-1 border-bottom border-primary"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                              <input class="custom-control-input" type="checkbox" id="same_as_res" name="same_as_res">
                                              <label for="same_as_res" class="custom-control-label" style="padding-top: 1px;">Same as Residential Address</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="prop_address">Postal Address</label>
                                            <input type="text" class="form-control" id="prop_address" name="prop_address" placeholder="Postal Address">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="prop_landmark">Landmark</label>
                                            <input type="text" class="form-control" id="prop_landmark" name="prop_landmark" placeholder="Landmark">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="prop_city">City</label>
                                            <input type="text" class="form-control" id="prop_city" name="prop_city" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="prop_state">State</label>
                                            <input type="text" class="form-control" id="prop_state" name="prop_state" placeholder="State">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="prop_pincode">Zip</label>
                                            <input type="text" class="form-control" id="prop_pincode" name="prop_pincode" placeholder="Zip">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center my-3">
                                    <div class="flex-grow-1 border-bottom border-primary"></div>
                                        <h6 class="text-nowrap text-primary text-uppercase border border-primary d-inline-block px-3 py-1 m-0">Co applicant details</h6>
                                    <div class="flex-grow-1 border-bottom border-primary"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="co_fullname">Full Name</label>
                                            <input type="text" class="form-control" id="co_fullname" name="co_fullname" placeholder="Full Name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="co_relation">Relation</label>
                                            <input type="text" class="form-control" id="co_relation" name="co_relation" placeholder="Relation">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="co_dob">Date of Birth</label>
                                            <input type="text" class="form-control" id="co_dob" name="co_dob" placeholder="Date of Birth">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="co_mobile">Mobile Number</label>
                                            <input type="text" class="form-control" id="co_mobile" name="co_mobile" placeholder="Mobile Number">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="co_profession_type">Profession Type</label>
                                            <div class="group">
                                                <input type="radio" id="co_job" name="co_profession_type" value="Job" checked>
                                                <label for="co_job">Job</label>
                                                <span class="mx-2"></span>
                                                <input type="radio" id="co_business" name="co_profession_type" value="Business">
                                                <label for="co_business">Business</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="co_job_type_div">
                                        <div class="form-group">
                                            <label for="co_job_type">Job Type</label>
                                            <div class="group">
                                                <input type="radio" id="co_salary_account" name="co_job_type" value="Salary Account" checked>
                                                <label for="co_salary_account">Salary Account</label>
                                                <span class="mx-2"></span>
                                                <input type="radio" id="co_cash_account" name="co_job_type" value="Cash Account">
                                                <label for="co_cash_account">Cash Account</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="co_profession_details">Profession Details</label>
                                            <textarea class="form-control" id="co_profession_details" name="co_profession_details" rows="4" cols="50" placeholder="Profession Details"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center my-3">
                                    <div class="flex-grow-1 border-bottom border-primary"></div>
                                        <h6 class="text-nowrap text-primary text-uppercase border border-primary d-inline-block px-3 py-1 m-0">KYC Details</h6>
                                    <div class="flex-grow-1 border-bottom border-primary"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="aadhar">Aadhar</label>
                                            <input type="text" class="form-control" id="aadhar" name="aadhar" placeholder="Aadhar">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="aadharImage">Upload Aadhar Image</label>
                                            <div class="input-group aadhar_div">
                                                <div class="custom-file">             
                                                    <input type="file" class="custom-file-input" id="aadharImage" name="aadharImage">
                                                    <label class="custom-file-label" for="aadharImage">Choose file</label>
                                                </div>              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pan">PAN Number</label>
                                            <input type="text" class="form-control" id="pan" name="pan" placeholder="PAN Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="panImage">Upload Pan Image</label>
                                            <div class="input-group pan_div">
                                                <div class="custom-file">             
                                                    <input type="file" class="custom-file-input" id="panImage" name="panImage">
                                                    <label class="custom-file-label" for="panImage">Choose file</label>
                                                </div>              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="btnsubmit" name="btnsubmit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
<style>
    .form .select2-container--default .select2-selection--single {
        border: 1px solid #ced4da;
    }
</style>
<script>
    $(function () {
        $('.select2').select2();
        bsCustomFileInput.init();
        $("#doj").datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        $("#dob").datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        $("#co_dob").datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        $('input[name="profession_type"]').on('change', function () {
            if ($('input[name="profession_type"]:checked').val() === 'Job') {
                $('#job_type_div').show();
            } else {
                $('#job_type_div').hide();
            }
        });
        $('input[name="co_profession_type"]').on('change', function () {
            if ($('input[name="co_profession_type"]:checked').val() === 'Job') {
                $('#co_job_type_div').show();
            } else {
                $('#co_job_type_div').hide();
            }
        });
        $('#same_as_res').change(function() {
            if ($(this).is(':checked')) {
                $('#prop_address').val($('#res_address').val());
                $('#prop_landmark').val($('#res_landmark').val());
                $('#prop_city').val($('#res_city').val());
                $('#prop_state').val($('#res_state').val());
                $('#prop_pincode').val($('#res_pincode').val());
            } else {
                $('#prop_address, #prop_landmark, #prop_city, #prop_state, #prop_pincode').val('');
            }
        });
        $('#add-customers-form').validate({
            rules:{
                productId:{
                    required: true
                },
                subProductId:{
                    required: true
                },
                loanAmount:{
                    required: true,
                    digits: true
                },
                fullName:{
                    required: true
                },
                customerImage:{
                    extension: "png|jpg|jpeg",
                    maxsize: 1000000,
                },
                mobile: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10,
                    remote: {
                        url: "{{ route('check-mobile') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            mobile: function() {
                                return $('#mobile').val();
                            }
                        }
                    }
                },
                phone: {
                    digits: true
                },
                email: {
                    alphanumeric: true
                },
                alt_mobile: {
                    digits: true,
                    minlength: 10,
                    maxlength: 10,
                },
                noOfDependent: {
                    digits: true
                },
                bankDocumentPath:{
                    extension: "pdf",
                    maxsize: 1000000,
                },
                co_mobile: {
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                resPropertyTaxDoc:{
                    maxsize: 1000000,
                },
                resLightBillDoc:{
                    maxsize: 1000000,
                },
                aadharImage:{
                    maxsize: 1000000,
                },
                panImage:{
                    maxsize: 1000000,
                }
            },
            messages:{
                productId:{
                    required: "Please select product."
                },
                subProductId:{
                    required: "Please select sub product."
                },
                loanAmount:{
                    required: "Please enter loan amount."
                },
                fullName:{
                    required: "Please enter name."
                },
                customerImage: {
                    extension: "Please select valid image.",
                    maxsize: "File size must be less than 1MB."
                },
                mobile:{
                    required: "Plese enter mobile number.",
                    remote: "Customer mobile already exists."
                },
                email:{
                    email: "Please provide a valid email."
                },
                bankDocumentPath: {
                    extension: "Please select valid pdf.",
                    maxsize: "File size must be less than 1MB."
                },
                resPropertyTaxDoc: {
                    maxsize: "File size must be less than 1MB."
                },
                resLightBillDoc: {
                    maxsize: "File size must be less than 1MB."
                },
                aadharImage: {
                    maxsize: "File size must be less than 1MB."
                },
                panImage: {
                    maxsize: "File size must be less than 1MB."
                }
            },
            errorPlacement: function(error, element) {
                if (element.hasClass('select2-hidden-accessible')) {
                    error.insertAfter(element.next('.select2-container'));
                } else if (element.attr("name") == "customerImage" ) {
                    $(".image_div").after(error);
                } else if (element.attr("name") == "bankDocumentPath" ) {
                    $(".pdf_div").after(error);
                } else if (element.attr("name") == "resPropertyTaxDoc" ) {
                    $(".tax_div").after(error);
                } else if (element.attr("name") == "resLightBillDoc" ) {
                    $(".bill_div").after(error);
                } else if (element.attr("name") == "aadharImage" ) {
                    $(".aadhar_div").after(error);
                } else if (element.attr("name") == "panImage" ) {
                    $(".pan_div").after(error);
                } else {
                    error.insertAfter(element);
                }
            }
        });
    });
</script>
@endsection