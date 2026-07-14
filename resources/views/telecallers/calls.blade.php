@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between">
                        <h1 class="m-0">Calls</h1>
                        <a href="{{route('telecallers.calls.add')}}" class="btn btn-primary">Add New Call</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="" class="form" id="fetch-calls" enctype="multipart/form-data">
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
                                            <select id="type" name="type" class="form-control" {{ (Auth::user()->canAccessSecure == 1 && Auth::user()->canAccessUnSecure == 1) ? '' : 'disabled' }}>
                                                <option value="">Select Loan Type</option>
                                                <option value="1" @if(Auth::user()->canAccessSecure == 1 && !Auth::user()->canAccessUnSecure) selected @endif>Secure</option>
                                                <option value="0" @if(!Auth::user()->canAccessSecure && Auth::user()->canAccessUnSecure == 1) selected @endif>UnSecure</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select id="sub_product" name="sub_product" class="form-control">
                                                <option value="">Select Product</option>
                                                @foreach($sub_products as $sub_product)
                                                    <option value="{{$sub_product->id}}">{{$sub_product->name}}</option>
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
                                            <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Start Followup Date">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="end_date" name="end_date" placeholder="End Followup Date">
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
                            <h3 class="card-title">All Calls</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableCall" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th width="100">Action</th>
                                            <th>Customer Name</th>
                                            <th>Customer Mobile</th>
                                            <th>Product Name</th>
                                            <th>Loan Amount</th>
                                            <th>Followup Date</th>
                                            <th>Followup Remarks</th>
                                            <th>Status</th>
                                            <th>Date of Closing</th>
                                            <th>Remarks</th>
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
<div class="modal fade" id="followUpModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 shadow-lg">
            <form id="followUpForm">
                <div class="modal-header bg-primary text-white py-2 px-4">
                    <h5 class="modal-title">Add Follow Up</h5>
                    <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body p-4">
                    @csrf
                    <input type="hidden" name="call_id" id="call_id">
                    <div class="border border-primary d-inline-block px-2 py-1 mb-3"><span id="customer_name" class="mx-2"></span>-<span id="customer_mobile" class="mx-2"></span></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="followup_date">Follow Date*</label>
                                <input type="text" class="form-control" id="followup_date" name="followup_date" placeholder="Follow Date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="followup_remarks">Follow Remarks*</label>
                                <textarea class="form-control" id="followup_remarks" name="followup_remarks" rows="4" cols="50" placeholder="Follow Remarks"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-primary py-1 px-4">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="followUpLogModal">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white py-2 px-4">
                <h5 class="modal-title">Follow Up Logs</h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body p-4">
                <div class="text-center py-5">
                    <i class="fas fa-spinner fa-spin fa-2x text-primary"></i>
                    <p class="mt-2 mb-0">Loading...</p>
                </div>
            </div>
            <div class="modal-footer bg-primary py-1 px-4">
                <button class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<style>
    .form .select2-container--default .select2-selection--single {
        border: 1px solid #ced4da;
    }
    .dataTables_wrapper div.dt-buttons {
        margin-bottom: .5rem;
    }
    .table td {
        padding: 8px;
    }
</style>
<script>
    $(document).ready(function() {
        let params = new URLSearchParams(window.location.search);
        if(params.has('status')){
            let status = params.get('status');
            if ($('#status option[value="' + status + '"]').length) {
                $('#status').val(status);
            } else {
                $('#status').val('');
            }
        }
        @if(Auth::user()->canAccessSecure == 1 && Auth::user()->canAccessUnSecure == 1)
            if(params.has('type')){
                let type = params.get('type');
                if ($('#type option[value="' + type + '"]').length) {
                    $('#type').val(type);
                } else {
                    $('#type').val('');
                }
            }
        @endif
        $('.select2').select2();
        $("#start_date").datepicker({
            'format': 'dd/mm/yyyy',
            'autoclose': true
        }).on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#end_date').datepicker('setStartDate', minDate);
            $(this).valid();
        });
        $("#end_date").datepicker({
            'format': 'dd/mm/yyyy',
            'autoclose': true
        }).on('changeDate', function (selected) {
            var maxDate = new Date(selected.date.valueOf());
            $('#start_date').datepicker('setEndDate', maxDate);
            $(this).valid();
        });
        $("#followup_date").datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        var table = $('#dataTableCall').DataTable({
           serverSide: true,
           responsive: true,
           autoWidth: false,
           ajax: {
                url: '{{route("telecallers.calls")}}',
                data: function (d) {
                    d.type = $('#type').val();
                    d.status = $('#status').val();
                    d.sub_product = $('#sub_product').val();
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
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
                            type: $('#type').val(),
                            status: $('#status').val(),
                            sub_product: $('#sub_product').val(),
                            start_date: $('#start_date').val(),
                            end_date: $('#end_date').val(),
                        });
                        window.location = "{{ route('telecallers.calls.export.csv') }}?" + params;
                    }
                }
           ],
           responsive: {
                details: {
                    type: 'column',
                    target: 0
                }
           },
           columnDefs: [
                {
                    targets: 0,
                    className: 'dtr-control',
                    createdCell: function (td) {
                        $(td).css('min-width', '30px');
                    },
                    orderable: false
                },
                {
                    targets: 1,
                    className: 'text-center',
                    createdCell: function (td) {
                        $(td).css('min-width', '30px');
                    }
                }
           ],
           columns: [
                { data: null, name: 'id', orderable: false, searchable: false, defaultContent: '' },
                { data: 'action', orderable:false, searchable:false },
                { data: 'customer_name', name: 'customer_name' },
                { data: 'customer_mobile', name: 'customer_mobile' },
                { data: 'product_name', name: 'subProducts.name' },
                { data: 'loan_amount', name: 'loan_amount'},
                { data: 'last_followup_date', name: 'last_followup_date' },
                { data: 'last_followup_remarks', name: 'last_followup_remarks' },
                { data: 'status', name: 'status' },
                { data: 'closing_date', name: 'closing_date' },
                { data: 'remarks', name: 'remarks' }
            ]
        });
        $('#fetch-calls').validate({
            rules:{
                start_date:{
                    required:function(){
                        if($('#end_date').val()!='') {
                            return true;
                        }
                        return false;
                    },
                },
                end_date:{
                    required:function(){
                        if($('#start_date').val()!='') {
                            return true;
                        }
                        return false;
                    },
                }
            },
            messages:{
                start_date:{
                    required: "Please select start date."
                },
                end_date:{
                    required: "Please select end date."
                }
            },
            submitHandler: function (form) {
                table.draw();
            }
        });
        $(document).on('click','.openFollowUpModal',function(){
            $('#followUpForm')[0].reset();
            if ($('#followUpForm').data('validator')) {
                $('#followUpForm').validate().resetForm();
            }
            let callId = $(this).data('id');
            $('#call_id').val(callId);
            $.ajax({
                url: '/telecallers/call/' + callId + '/details',
                type: 'GET',
                success: function(response) {
                    $('#customer_name').text(response.customer_name);
                    $('#customer_mobile').text(response.customer_mobile);
                    $('#followUpModal').modal('show');
                }
            });
        });
        $('#followUpForm').validate({
            rules: {
                followup_date: {
                    required: true
                },
                followup_remarks: {
                    required: true
                }
            },
            messages: {
                followup_date: {
                    required: "Please select date"
                },
                followup_remarks: {
                    required: "Please enter followup remarks"
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    url: "{{ route('telecallers.calls.update.followup') }}",
                    type: "POST",
                    data: $(form).serialize(),
                    success: function(response) {
                        $('#followUpModal').modal('hide');
                        toastr.success('Follow up added successfully.');
                        form.reset();
                        $('#dataTableCall').DataTable().ajax.reload(null, false);
                    },
                    error: function(xhr) {
                        toastr.error('Something went wrong');
                    }
                });
                return false;
            }
        });
        $(document).on('click','.openFollowUpLogModal',function(){
            let callId = $(this).data('id');
            $('#followUpLogModal .modal-body').load(
                '/telecallers/call/' + callId + '/followup-logs',
                function () {
                    $('#followUpLogModal').modal('show');
                }
            );
        });
    });
</script>
@endsection