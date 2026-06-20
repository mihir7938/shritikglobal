@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between">
                        <h1 class="m-0">Sub Products</h1>
                        <a href="{{route('admin.subproducts.add')}}" class="btn btn-primary">Add New Sub Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('shared.alert')
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">All Sub Products</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="100">Action</th>
                                            <th>Product Name</th>
                                            <th>Sub Product Name</th>
                                            <td>Type</td>
                                            <td>Status</td>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Action</th>
                                            <th>Product Name</th>
                                            <th>Sub Product Name</th>
                                            <td>Type</td>
                                            <td>Status</td>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($sub_products as $sub_product)
                                            <tr>
                                                <td class="text-center">
                                                    <a href="{{route('admin.subproducts.edit', ['id' => $sub_product->id])}}" class="btn btn-outline-primary btn-circle">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href="{{route('admin.subproducts.delete', ['id' => $sub_product->id])}}" class="btn btn-outline-danger btn-circle">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                                <td>{{$sub_product->product->name}}</td>
                                                <td>{{$sub_product->name}}</td>
                                                <td>
                                                    @if(isset($sub_product->type) && $sub_product->type == 1)
                                                        Secure
                                                    @elseif(isset($sub_product->type) && $sub_product->type == 0)
                                                        InSecure
                                                    @endif
                                                </td>
                                                <td>{{($sub_product->status == 1) ? 'Active' : 'InActive'}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection