@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sub Products</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('admin.subproducts.add.save')}}" class="form" id="add-subproducts-form" enctype="multipart/form-data">
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
                                <h3 class="card-title">Add Sub Product</h3>
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
                                            <label for="product_id">Product*</label>
                                            <select id="product_id" name="product_id" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">Type</label>
                                            <div class="group">
                                                <input type="radio" id="secure" name="type" value="1">
                                                <label for="secure">Secure</label>
                                                <span class="mx-2"></span>
                                                <input type="radio" id="unsecure" name="type" value="0">
                                                <label for="unsecure">UnSecure</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Active</label>
                                            <div class="group">
                                                <input type="radio" id="yes" name="status" value="1" checked>
                                                <label for="yes">Yes</label>
                                                <span class="mx-2"></span>
                                                <input type="radio" id="no" name="status" value="0">
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
        $('#add-subproducts-form').validate({
            rules:{
                name: {
                    required: true
                },
                product_id: {
                    required: true
                }
            },
            messages:{
                name:{
                    required: "Please enter name."
                },
                product_id:{
                    required: "Please select product."
                }
            }
        });
    });
</script>
@endsection