@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between">
                        <h1 class="m-0">Follow Up Details (Old)</h1>
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
                            <h3 class="card-title">All Follow Up Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableCall" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer Name</th>
                                            <th>Customer Mobile</th>
                                            <th>Telecaller Name</th>
                                            <th>Remarks</th>
                                            <th>Status</th>
                                            <th width="100">Added On</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer Name</th>
                                            <th>Customer Mobile</th>
                                            <th>Telecaller Name</th>
                                            <th>Remarks</th>
                                            <th>Status</th>
                                            <th width="100">Added On</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($followups as $followup)
                                            <tr>
                                                <td>{{$followup->id}}</td>
                                                <td>{{$followup->name}}</td>
                                                <td>{{$followup->mobile}}</td>
                                                <td>{{optional($followup->telecallers)->name}}</td>
                                                <td>{{$followup->remarks}}</td>
                                                <td>{{$followup->status}}</td>
                                                <td>{{$followup->created_at ? \Carbon\Carbon::parse($followup->created_at)->format('d M, Y H:i') : ''}}</td>
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
@section('footer')
<script>
    $(document).ready(function() {
        $('#dataTableCall').DataTable({
            "buttons": ["csv"],
            "responsive": true,
        }).buttons().container().appendTo('#dataTableCall_wrapper .col-md-6:eq(0) label');
    });
</script>
@endsection