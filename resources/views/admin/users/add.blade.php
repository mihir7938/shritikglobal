@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('admin.users.add.save')}}" class="form" id="add-users-form" enctype="multipart/form-data">
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
                                <h3 class="card-title">Add User</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name*</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Mobile Number*</label>
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type" class="text-danger">User Type*</label>
                                            <select id="type" name="type" class="form-control border border-danger">
                                                <option value="">Select</option>
                                                <option value="1">ADMIN</option>
                                                <option value="2">TELECALLER</option>
                                                <option value="3">ASSOCIATE</option>
                                                <option value="4">CORDINATOR</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label></label>
                                            <div class="loan_group">
                                                <input type="checkbox" class="mr-2" id="secure" name="secure" value="1">
                                                <label for="secure">Secure Loan</label>
                                                <span class="mx-2"></span>
                                                <input type="checkbox" class="mr-2" id="unsecure" name="unsecure" value="1">
                                                <label for="unsecure">UnSecure Loan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="active">Active</label>
                                            <div class="group">
                                                <input type="radio" id="yes" name="active" value="1" checked>
                                                <label for="yes">Yes</label>
                                                <span class="mx-2"></span>
                                                <input type="radio" id="no" name="active" value="0">
                                                <label for="no">No</label>
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
        $.validator.addMethod("loanTypeRequired", function(value, element) {
            return $('#secure').is(':checked') || $('#unsecure').is(':checked');
        }, "Please select at least one option.");
        $('#add-users-form').validate({
            rules:{
                name:{
                    required: true
                },
                phone: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                email: {
                    alphanumeric: true
                },
                type:{
                    required: true
                },
                secure: {
                    loanTypeRequired: true
                }
            },
            messages:{
                name:{
                    required: "Please enter name."
                },
                phone:{
                    required: "Plese enter mobile number.",
                },
                email:{
                    email: "Please provide a valid email."
                },
                type:{
                    required: "Plese select type.",
                },
                secure: {
                    loanTypeRequired: "Please select at least one option."
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "secure") {
                    error.insertAfter($('.loan_group'));
                } else {
                    error.insertAfter(element);
                }
            }
        });
        $('#secure, #unsecure').on('change', function () {
            $('#secure').valid();
            $('#unsecure').valid();
        });
    });
</script>
@endsection