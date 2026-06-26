@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between">
                        <h1 class="m-0">Customers</h1>
                        <a href="{{route('admin.customers.add')}}" class="btn btn-primary">Add New Customer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="" class="form" id="fetch-customers" enctype="multipart/form-data">
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select id="type" name="type" class="form-control">
                                                <option value="">Select Loan Type</option>
                                                <option value="1">Secure</option>
                                                <option value="0">UnSecure</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select id="status" name="status" class="form-control">
                                                <option value="">Select Loan Status</option>
                                                <option value="Office">Office</option>
                                                <option value="Forward to Bank">Forward to Bank</option>
                                                <option value="Login">Login</option>
                                                <option value="PD/Visit">PD/Visit</option>
                                                <option value="Sanction">Sanction</option>
                                                <option value="Agreement">Agreement</option>
                                                <option value="Disbursement">Disbursement</option>
                                                <option value="Closed">Closed</option>
                                                <option value="Reject">Reject</option>
                                                <option value="Return">Return</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select id="associate" name="associate" class="form-control select2">
                                                <option value="">Select Associate</option>
                                                @foreach($associates as $associate)
                                                    <option value="{{$associate->username}}">{{$associate->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select id="telecaller" name="telecaller" class="form-control select2">
                                                <option value="">Select Telecaller</option>
                                                @foreach($telecallers as $telecaller)
                                                    <option value="{{$telecaller->username}}">{{$telecaller->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Start Date">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="end_date" name="end_date" placeholder="End Date">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select id="sub_product" name="sub_product" class="form-control">
                                                <option value="">Select Product</option>
                                                @foreach($sub_products as $sub_product)
                                                    <option value="{{$sub_product->id}}">{{$sub_product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
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
                            <h3 class="card-title">All Customers</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableCustomer" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th width="100">Action</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Product</th>
                                            <th>Loan Amount</th>
                                            <th>Profession Type</th>
                                            <th>Profession Details</th>
                                            <th>Bank</th>
                                            <th>Contact Person</th>
                                            <th>Loan Status</th>
                                            <th>Status Remarks</th>
                                            <th>Address</th>
                                            <th>Telecaller Name</th>
                                            <th>Associate Name</th>
                                            <th>Joining Date</th>
                                            <th>Bank Remarks</th>
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
<div class="modal fade" id="statusModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 shadow-lg">
            <form id="statusForm">
                <div class="modal-header bg-primary text-white py-2 px-4">
                    <h5 class="modal-title">Change Status</h5>
                    <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body p-4">
                    @csrf
                    <input type="hidden" name="customer_id" id="customer_id">
                    <div class="border border-primary d-inline-block px-2 py-1 mb-3"><span id="customer_name" class="mx-2"></span>-<span id="customer_mobile" class="mx-2"></span></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Loan Status</label>
                                <select id="modal_status" name="modal_status" class="form-control" required>
                                    <option value="">Select Loan Status</option>
                                    <option value="Office">Office</option>
                                    <option value="Forward to Bank">Forward to Bank</option>
                                    <option value="Login">Login</option>
                                    <option value="PD/Visit">PD/Visit</option>
                                    <option value="Sanction">Sanction</option>
                                    <option value="Agreement">Agreement</option>
                                    <option value="Disbursement">Disbursement</option>
                                    <option value="Closed">Closed</option>
                                    <option value="Reject">Reject</option>
                                    <option value="Return">Return</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Remarks</label>
                                <textarea name="loanStatusRemark" id="loanStatusRemark" class="form-control" rows="4"></textarea>
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
<div class="modal fade" id="bankModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content border-0 shadow-lg">
            <form id="bankForm">
                <div class="modal-header bg-primary text-white py-2 px-4">
                    <h5 class="modal-title">File Transfer To Bank</h5>
                    <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body p-4">
                    @csrf
                    <input type="hidden" name="customer_id" id="bank_customer_id">
                    <div class="border border-primary d-inline-block px-2 py-1 mb-3"><span id="bank_customer_name" class="mx-2"></span>-<span id="bank_customer_mobile" class="mx-2"></span></div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bankName">Bank Name</label>
                                <input type="text" class="form-control" id="bankName" name="bankName" placeholder="Bank Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bankAssocName">Bank Associate Name</label>
                                <input type="text" class="form-control" id="bankAssocName" name="bankAssocName" placeholder="Bank Associate Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bankAssocMobile">Bank Associate Mobile</label>
                                <input type="text" class="form-control" id="bankAssocMobile" name="bankAssocMobile" placeholder="Bank Associate Mobile">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bankUpdateDate">Date</label>
                                <input type="text" class="form-control" id="bankUpdateDate" name="bankUpdateDate" placeholder="Date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Remarks</label>
                                <textarea name="bankRemarks" id="bankRemarks" class="form-control" rows="4"></textarea>
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
        let params = new URLSearchParams(window.location.search);
        if(params.has('status')){
            let status = params.get('status');
            if ($('#status option[value="' + status + '"]').length) {
                $('#status').val(status);
            } else {
                $('#status').val('');
            }
        }
        if(params.has('type')){
            let type = params.get('type');
            if ($('#type option[value="' + type + '"]').length) {
                $('#type').val(type);
            } else {
                $('#type').val('');
            }
        }
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
        $("#bankUpdateDate").datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        var table = $('#dataTableCustomer').DataTable({
           serverSide: true,
           responsive: true,
           autoWidth: false,
           ajax: {
                url: '{{route("admin.customers")}}',
                data: function (d) {
                    d.type = $('#type').val();
                    d.status = $('#status').val();
                    d.associate = $('#associate').val();
                    d.telecaller = $('#telecaller').val();
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                    d.sub_product = $('#sub_product').val();
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
                            associate: $('#associate').val(),
                            telecaller: $('#telecaller').val(),
                            start_date: $('#start_date').val(),
                            end_date: $('#end_date').val(),
                            sub_product: $('#sub_product').val(),
                        });
                        window.location = "{{ route('admin.customers.export.csv') }}?" + params;
                    }
                }
           ],
           order: [[9, 'desc']],
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
                { data: 'fullName', name: 'fullName' },
                { data: 'mobile', name: 'mobile' },
                { data: 'product_name', name: 'subProducts.name' },
                { data: 'loanAmount', name: 'loanAmount'},
                { data: 'profession_type', name: 'profession_type' },
                { data: 'profession_details', name: 'profession_details' },
                { data: 'bankName', name: 'bankName' },
                { data: 'bankAssocName', name: 'bankAssocName' },
                { data: 'loanStatus', name: 'loanStatus' },
                { data: 'loanStatusRemark', name: 'loanStatusRemark' },
                { data: 'res_address', name: 'res_address' },
                { data: 'telecaller_name', name: 'telecallers.name', orderable:false, searchable:false },
                { data: 'associate_name', name: 'associates.name', orderable:false, searchable:false },
                { data: 'joining_date', name: 'doj' },
                { data: 'bankRemarks', name: 'bankRemarks' }
            ]
        });
        $('#fetch-customers').validate({
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
        $(document).on('click','.openStatusModal',function(){
            $('#statusForm')[0].reset();
            if ($('#statusForm').data('validator')) {
                $('#statusForm').validate().resetForm();
            }
            let customerId = $(this).data('id');
            $('#customer_id').val(customerId);
            $.ajax({
                url: '/admin/customer/' + customerId + '/details',
                type: 'GET',
                success: function(response) {
                    $('#customer_name').text(response.fullName);
                    $('#customer_mobile').text(response.mobile);
                    $('#modal_status').val(response.loanStatus);
                    $('#statusModal').modal('show');
                }
            });
        });
        $('#statusForm').validate({
            rules: {
                modal_status: {
                    required: true
                }
            },
            messages: {
                modal_status: {
                    required: "Please select loan status"
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    url: "{{ route('admin.customers.update.status') }}",
                    type: "POST",
                    data: $(form).serialize(),
                    success: function(response) {
                        $('#statusModal').modal('hide');
                        toastr.success('Status updated successfully');
                        form.reset();
                        $('#dataTableCustomer').DataTable().ajax.reload(null, false);
                    },
                    error: function(xhr) {
                        toastr.error('Something went wrong');
                    }
                });
                return false;
            }
        });
        $(document).on('click','.openBankModal',function(){
            $('#bankForm')[0].reset();
            if ($('#bankForm').data('validator')) {
                $('#bankForm').validate().resetForm();
            }
            let customerId = $(this).data('id');
            $('#bank_customer_id').val(customerId);
            $.ajax({
                url: '/admin/customer/' + customerId + '/details',
                type: 'GET',
                success: function(response) {
                    $('#bank_customer_name').text(response.fullName);
                    $('#bank_customer_mobile').text(response.mobile);
                    $('#bankModal').modal('show');
                }
            });
        });
        $('#bankForm').validate({
            rules: {
                bankName: {
                    required: true
                },
                bankAssocMobile: {
                    digits: true
                },
                bankUpdateDate: {
                    required: true
                }
            },
            messages: {
                bankName: {
                    required: "Please enter bank name"
                },
                bankUpdateDate: {
                    required: "Please select date"
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    url: "{{ route('admin.customers.update.bank') }}",
                    type: "POST",
                    data: $(form).serialize(),
                    success: function(response) {
                        $('#bankModal').modal('hide');
                        toastr.success('Bank Details Updated Successfully');
                        form.reset();
                        $('#dataTableCustomer').DataTable().ajax.reload(null, false);
                    },
                    error: function(xhr) {
                        toastr.error('Something went wrong');
                    }
                });
                return false;
            }
        });
    });
</script>
@endsection