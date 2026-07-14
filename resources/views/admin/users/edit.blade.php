@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit User</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('admin.users.update.save')}}" class="form" id="edit-users-form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}" />
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
                                <h3 class="card-title">Username : {{$user->username}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name*</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$user->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Mobile Number*</label>
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile Number" value="{{$user->phone}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{$user->address}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">User Type*</label>
                                            <select id="type" name="type" class="form-control" disabled>
                                                <option value="">Select</option>
                                                <option value="1" @if($user->role_id == '1') selected @endif>ADMIN</option>
                                                <option value="2" @if($user->role_id == '2') selected @endif>TELECALLER</option>
                                                <option value="3" @if($user->role_id == '3') selected @endif>ASSOCIATE</option>
                                                <option value="4" @if($user->role_id == '4') selected @endif>CORDINATOR</option>
                                            </select>
                                        </div>
                                    </div>
                                    @php
                                        $selected = explode(',', $user->loan_type ?? '');
                                    @endphp
                                    <div class="col-md-6">
                                        @if(!$user->isAdmin())
                                            <div class="form-group">
                                                <label></label>
                                                <div class="loan_group">
                                                    <input type="checkbox" class="mr-2" id="secure" name="secure" value="1" @if($user->canAccessSecure == '1') checked @endif>
                                                    <label for="secure">Secure Loan</label>
                                                    <span class="mx-2"></span>
                                                    <input type="checkbox" class="mr-2" id="unsecure" name="unsecure" value="1" @if($user->canAccessUnSecure == '1') checked @endif>
                                                    <label for="unsecure">UnSecure Loan</label>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        @if(!$user->isAdmin())
                                            <div class="form-group">
                                                <label for="active">Active</label>
                                                <div class="group">
                                                    <input type="radio" id="yes" name="active" value="1" @if($user->status == 1) checked @endif>
                                                    <label for="yes">Yes</label>
                                                    <span class="mx-2"></span>
                                                    <input type="radio" id="no" name="active" value="0" @if($user->status == 0) checked @endif>
                                                    <label for="no">No</label>
                                                </div>
                                            </div>
                                        @endif
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
        $('#edit-users-form').validate({
            rules:{
                name:{
                    required: true
                },
                email: {
                    alphanumeric: true
                },
                secure: {
                    loanTypeRequired: true
                }
            },
            messages:{
                name:{
                    required: "Please enter name."
                },
                email:{
                    email: "Please provide a valid email."
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