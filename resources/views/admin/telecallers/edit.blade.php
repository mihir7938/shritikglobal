@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Calls</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('admin.calls.update.save')}}" class="form" id="edit-calls-form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$call->id}}" />
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
                                <h3 class="card-title">Edit Call</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="customer_name">Customer Name*</label>
                                            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Customer Name" value="{{ $call->customer_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="customer_mobile">Customer Mobile*</label>
                                            <input type="text" class="form-control" id="customer_mobile" name="customer_mobile" placeholder="Customer Mobile" value="{{ $call->customer_mobile }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="loan_amount">Expt Loan Amount*</label>
                                            <input type="text" class="form-control" id="loan_amount" name="loan_amount" placeholder="Expt Loan Amount" value="{{ $call->loan_amount }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="product_id">Product*</label>
                                            <select id="product_id" name="product_id" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}" @if($call->product_id == $product->id) selected @endif>{{$product->name}}</option>
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
                                                    <option value="{{$sub_product->id}}" @if($call->sub_product_id == $sub_product->id) selected @endif>{{$sub_product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="remarks">Remarks*</label>
                                            <textarea class="form-control" id="remarks" name="remarks" rows="4" cols="50" placeholder="Remarks">{{ $call->remarks }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status*</label>
                                            <select id="status" name="status" class="form-control">
                                                <option value="Open" @if($call->status == 'Open') selected @endif>Open</option>
                                                <option value="Closed" @if($call->status == 'Closed') selected @endif>Closed</option>
                                            </select>
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
        $('#edit-calls-form').validate({
            rules:{
                customer_name: {
                    required: true
                },
                customer_mobile: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                loan_amount:{
                    required: true,
                    digits: true
                },
                product_id: {
                    required: true
                },
                sub_product_id: {
                    required: true
                },
                remarks: {
                    required: true
                }
            },
            messages:{
                customer_name:{
                    required: "Please enter customer name."
                },
                customer_mobile:{
                    required: "Plese enter mobile number."
                },
                loan_amount:{
                    required: "Please enter loan amount."
                },
                product_id:{
                    required: "Please select product."
                },
                sub_product_id:{
                    required: "Please select sub product."
                },
                remarks:{
                    required: "Please enter remarks."
                }
            }
        });
    });
</script>
@endsection