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
                    <form method="POST" action="{{route('admin.customers.add.save')}}" class="form" id="add-customers-form" enctype="multipart/form-data">
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
                                            <label for="product_id">Product*</label>
                                            <select id="product_id" name="product_id" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="sub_product_id">Sub Product*</label>
                                            <select id="sub_product_id" name="sub_product_id" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($sub_products as $sub_product)
                                                    <option value="{{$sub_product->id}}">{{$sub_product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="loan_amount">Expt Loan Amount*</label>
                                            <input type="text" class="form-control" id="loan_amount" name="loan_amount" placeholder="Expt Loan Amount">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="associate_id">Associate*</label>
                                            <select id="associate_id" name="associate_id" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($associates as $associate)
                                                    <option value="{{$associate->id}}">{{$associate->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="telecaller_id">Telecaller*</label>
                                            <select id="telecaller_id" name="telecaller_id" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($telecallers as $telecaller)
                                                    <option value="{{$telecaller->id}}">{{$telecaller->name}}</option>
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
                                            <label for="name">Applicant Full Name*</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Applicant Full Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="upload_image">Upload Applicant Image</label>
                                            <div class="input-group image_div">
                                                <div class="custom-file">             
                                                    <input type="file" class="custom-file-input" id="upload_image" name="upload_image">
                                                    <label class="custom-file-label" for="upload_image">Choose file</label>
                                                </div>              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="father_name">Father/Husband Name</label>
                                            <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Father/Husband Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mother_name">Mother Name</label>
                                            <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Mother Name">
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
                                            <label for="alternate_mobile">Alternate Mobile</label>
                                            <input type="text" class="form-control" id="alternate_mobile" name="alternate_mobile" placeholder="Alternate Mobile">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date of Joining</label>
                                            <input type="text" class="form-control" id="joining_date" name="joining_date" placeholder="Date of Joining">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" placeholder="Date of Birth">
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
                                            <label for="marital_status">Marital Status</label>
                                            <div class="group">
                                                <input type="radio" id="married" name="marital_status" value="Married" checked>
                                                <label for="married">Married</label>
                                                <span class="mx-2"></span>
                                                <input type="radio" id="unmarried" name="marital_status" value="Unmarried">
                                                <label for="unmarried">Unmarried</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dependent">No of Dependent</label>
                                            <input type="text" class="form-control" id="dependent" name="dependent" placeholder="No of Dependent">
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
                                            <label for="bank_name">Bank Name</label>
                                            <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="account_type">Account Type</label>
                                            <div class="group">
                                                <input type="radio" id="savings" name="account_type" value="Savings" checked>
                                                <label for="savings">Savings</label>
                                                <span class="mx-2"></span>
                                                <input type="radio" id="current" name="account_type" value="Current">
                                                <label for="current">Current</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bank_pdf">Bank PDF</label>
                                            <div class="input-group pdf_div">
                                                <div class="custom-file">             
                                                    <input type="file" class="custom-file-input" id="bank_pdf" name="bank_pdf">
                                                    <label class="custom-file-label" for="bank_pdf">Choose file</label>
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
                                    <div class="col-md-4">
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
                                            <label for="postal_address">Postal Address</label>
                                            <input type="text" class="form-control" id="postal_address" name="postal_address" placeholder="Postal Address">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="landmark">Landmark</label>
                                            <input type="text" class="form-control" id="landmark" name="landmark" placeholder="Landmark">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input type="text" class="form-control" id="state" name="state" placeholder="State">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="zip">Zip</label>
                                            <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="property_type">Property Type</label>
                                            <div class="group">
                                                <input type="radio" id="owned" name="property_type" value="Owned" checked>
                                                <label for="owned">Owned</label>
                                                <span class="mx-2"></span>
                                                <input type="radio" id="rented" name="property_type" value="Rented">
                                                <label for="rented">Rented</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="property_tax">Property Tax</label>
                                            <div class="input-group tax_div">
                                                <div class="custom-file">             
                                                    <input type="file" class="custom-file-input" id="property_tax" name="property_tax">
                                                    <label class="custom-file-label" for="property_tax">Choose file</label>
                                                </div>              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="light_bill">Light Bill</label>
                                            <div class="input-group bill_div">
                                                <div class="custom-file">             
                                                    <input type="file" class="custom-file-input" id="light_bill" name="light_bill">
                                                    <label class="custom-file-label" for="light_bill">Choose file</label>
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="postal_address">Postal Address</label>
                                            <input type="text" class="form-control" id="postal_address" name="postal_address" placeholder="Postal Address">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="landmark">Landmark</label>
                                            <input type="text" class="form-control" id="landmark" name="landmark" placeholder="Landmark">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input type="text" class="form-control" id="state" name="state" placeholder="State">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="zip">Zip</label>
                                            <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip">
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
                                            <label for="full_name">Full Name</label>
                                            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="relation">Relation</label>
                                            <input type="text" class="form-control" id="relation" name="relation" placeholder="Relation">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="text" class="form-control" id="co_birth_date" name="co_birth_date" placeholder="Date of Birth">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="mobile">Mobile Number</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
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
                                    <div class="col-md-3">
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
                                    <div class="col-md-6">
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
                                            <label for="aadhar_image">Upload Aadhar Image</label>
                                            <div class="input-group aadhar_div">
                                                <div class="custom-file">             
                                                    <input type="file" class="custom-file-input" id="aadhar_image" name="aadhar_image">
                                                    <label class="custom-file-label" for="aadhar_image">Choose file</label>
                                                </div>              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pan_number">PAN Number</label>
                                            <input type="text" class="form-control" id="pan_number" name="pan_number" placeholder="PAN Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pan_image">Upload Pan Image</label>
                                            <div class="input-group pan_div">
                                                <div class="custom-file">             
                                                    <input type="file" class="custom-file-input" id="pan_image" name="pan_image">
                                                    <label class="custom-file-label" for="pan_image">Choose file</label>
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
<script>
    $(function () {
        $("#joining_date").datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        $("#birth_date").datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        $("#co_birth_date").datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        $('#add-users-form').validate({
            rules:{
                name:{
                    required: true
                },
                email: {
                    alphanumeric: true
                },
                phone: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                password: {
                    required: true,
                    strong_password: true
                },
                type:{
                    required: true
                }
            },
            messages:{
                name:{
                    required: "Please enter name."
                },
                email:{
                    email: "Please provide a valid email."
                },
                phone:{
                    required: "Plese enter mobile number.",
                },
                password:{
                    required: "Plese enter password.",
                },
                type:{
                    required: "Plese select type.",
                }
            },
            errorPlacement: function(error, element) {
                if (element.hasClass('select2-hidden-accessible')) {
                    error.insertAfter(element.next('.select2-container'));
                } else {
                    error.insertAfter(element);
                }
            }
        });
    });
</script>
@endsection