@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between">
                        <h1 class="m-0">File Status</h1>
                        <a href="#" class="btn btn-primary">Add New Closing Call</a>
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
                            <h3 class="card-title">All Closing Call</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="30">Action</th>
                                            <th>Customer Name</th>
                                            <th>Customer Mobile</th>
                                            <th>Sub Product Name</th>
                                            <th>Loan Amount</th>
                                            <th>Telecaller Name</th>
                                            <th width="100">Date of Closing</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="30">Action</th>
                                            <th>Customer Name</th>
                                            <th>Customer Mobile</th>
                                            <th>Sub Product Name</th>
                                            <th>Loan Amount</th>
                                            <th>Telecaller Name</th>
                                            <th width="100">Date of Closing</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($close_calls as $close_call)
                                            <tr>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-outline-danger btn-circle">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                                <td>{{$close_call->customerName}}</td>
                                                <td>{{$close_call->mobile}}</td>
                                                <td>{{$close_call->subProductName}}</td>
                                                <td>{{$close_call->loanAmount}}</td>
                                                <td>{{optional($close_call->telecallers)->name}}</td>
                                                <td>{{$close_call->created_at ? \Carbon\Carbon::parse($close_call->created_at)->format('d M, Y H:i') : ''}}</td>
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