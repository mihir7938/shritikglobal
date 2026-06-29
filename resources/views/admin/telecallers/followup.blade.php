@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between">
                        <h1 class="m-0">Follow Up Details</h1>
                        <a href="{{route('admin.followup.add')}}" class="btn btn-primary">Add New Follow Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="" class="form" id="fetch-followup" enctype="multipart/form-data">
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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select id="telecaller" name="telecaller" class="form-control select2">
                                                <option value="">Select Telecaller</option>
                                                @foreach($telecallers as $telecaller)
                                                    <option value="{{$telecaller->username}}">{{$telecaller->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select id="status" name="status" class="form-control">
                                                <option value="">Select Status</option>
                                                <option value="Open">Open</option>
                                                <option value="Closed">Closed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary w-100" id="btnsubmit" name="btnsubmit">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">All Follow Up Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableTelecaller" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Customer Mobile</th>
                                            <th>Telecaller Name</th>
                                            <th>Remarks</th>
                                            <th>Status</th>
                                            <th width="100">Added On</th>
                                        </tr>
                                    </thead>
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
<style>
    .form .select2-container--default .select2-selection--single {
        border: 1px solid #ced4da;
    }
    .dataTables_wrapper div.dt-buttons {
        margin-bottom: .5rem;
    }
</style>
<script>
    $(document).ready(function() {
        $('.select2').select2();
        var table = $('#dataTableTelecaller').DataTable({
           serverSide: true,
           responsive: true,
           ajax: {
                url: '{{route("admin.followup")}}',
                data: function (d) {
                    d.telecaller = $('#telecaller').val();
                    d.status = $('#status').val();
                },
                beforeSend: function() {
                    $('.loader').show();
                },
                complete: function() {
                    $('.loader').hide();
                }
           },
           dom: '<"row"<"col-md-6 d-flex align-items-center"lB><"col-md-6 text-end"f>>rt' +
                '<"row"<"col-md-6"i><"col-md-6 text-end"p>>',
           buttons: [
                {
                    text: 'CSV',
                    action: function (e, dt, node, config) {
                        var params = $.param({
                            telecaller: $('#telecaller').val(),
                            status: $('#status').val(),
                        });
                        window.location = "{{ route('admin.followup.export.csv') }}?" + params;
                    }
                }
           ],
           order: [[1, 'desc']],
           columns: [
                { data: 'name', name: 'name', orderable:false },
                { data: 'mobile', name: 'mobile' },
                { data: 'telecaller_name', name: 'telecallers.name', orderable:false, searchable:false },
                { data: 'remarks', name: 'remarks' },
                { data: 'status', name: 'status' },
                { data: 'created_at', name: 'created_at'},
            ]
        });
        $('#fetch-followup').validate({
            submitHandler: function (form) {
                table.draw();
            }
        });
    });
</script>
@endsection