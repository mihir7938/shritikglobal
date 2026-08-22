<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details - {{ $customer->fullName }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700&display=fallback">
    <style>
        @media print {
            .no-print { display: none !important; }
        }
        * {
            box-sizing: border-box;
        }
        html,
        body {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #222;
            background: #fff;
        }
        .print-container {
            width: 100%;
            padding: 15px;
        }
        .print-row {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            margin-left: -6px;
            margin-right: -6px;
        }
        .print-col-3 {
            width: 25%;
            padding: 0 6px;
            margin-bottom: 12px;
        }
        .print-col-4 {
            width: 33.333333%;
            padding: 0 6px;
            margin-bottom: 12px;
        }
        .print-col-6 {
            width: 50%;
            padding: 0 6px;
            margin-bottom: 12px;
        }
        .print-col-8 {
            width: 66.666666%;
            padding: 0 6px;
            margin-bottom: 12px;
        }
        .print-col-12 {
            width: 100%;
            padding: 0 6px;
            margin-bottom: 12px;
        }
        .print-label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .print-value {
            border: 1px solid #ced4da;
            border-radius: 3px;
            min-height: 30px;
            padding: 7px 8px;
            background: #fff;
            word-break: break-word;
        }
        .print-textarea {
            min-height: 60px;
        }
        .print-section {
            border-top: 1px solid #007bff;
            text-align: center;
            margin: 22px 0 18px;
            height: 1px;
        }
        .print-section span {
            position: relative;
            top: -11px;
            background: #fff;
            border: 1px solid #007bff;
            color: #007bff;
            padding: 5px 14px;
            font-size: 12px;
        }
        .print-radio {
            display: inline-block;
            margin-right: 18px;
            padding-top: 5px;
        }
        .radio-circle {
            display: inline-block;
            width: 11px;
            height: 11px;
            border: 1px solid #777;
            border-radius: 50%;
            margin-right: 4px;
            vertical-align: -1px;
        }
        .radio-circle.checked {
            border: 3px solid #007bff;
        }
        .print-image {
            max-width: 120px;
            max-height: 130px;
            border: 1px solid #ccc;
            padding: 2px;
        }
        .document-image {
            max-width: 250px;
            max-height: 150px;
            border: 1px solid #ccc;
        }
        @page {
            size: A4;
            margin: 10mm;
        }
    </style>
</head>
<body>
    <div class="print-container">
        <div class="text-center p-4 mb-4 no-print" style="border-bottom: 1px solid #007bff;">
            <button onclick="window.print()" class="btn btn-primary me-3">
                <i class="fas fa-print me-2"></i>Print Receipt
            </button>
            <button onclick="window.close()" class="btn btn-dark">
                <i class="fas fa-times me-2"></i>Close
            </button>
        </div>
        <div class="print-row">
            <div class="print-col-4">
                <div class="print-label">Product</div>
                <div class="print-value">
                    {{ optional($customer->product)->name }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">Sub Product</div>
                <div class="print-value">
                    {{ optional($customer->subProducts)->name }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">Expt Loan Amount</div>
                <div class="print-value">
                    {{ $customer->loanAmount }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">Associate</div>
                <div class="print-value">
                    {{ optional($customer->associates)->name }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">Telecaller</div>
                <div class="print-value">
                    {{ optional($customer->telecallers)->name }}
                </div>
            </div>
        </div>
        <div class="print-section">
            <span>PERSONAL DETAILS</span>
        </div>
        <div class="print-row">
            <div class="print-col-4">
                <div class="print-label">Applicant Full Name</div>
                <div class="print-value">
                    {{ $customer->fullName }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">Applicant Image</div>
                @if($customer->customerImage)
                    <img src="{{asset('assets/'.$customer->customerImage)}}" class="print-image" />
                @else
                    <div class="print-value">
                        No Image
                    </div>
                @endif
            </div>
            <div class="print-col-4">
                <div class="print-label">Father/Husband Name</div>
                <div class="print-value">
                    {{ $customer->surName }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">Mother Name</div>
                <div class="print-value">
                    {{ $customer->motherName }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">Mobile</div>
                <div class="print-value">
                    {{ $customer->mobile }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">Phone</div>
                <div class="print-value">
                    {{ $customer->phone }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">Email</div>
                <div class="print-value">
                    {{ $customer->email }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">Alternate Mobile</div>
                <div class="print-value">
                    {{ $customer->alt_mobile }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">Date of Joining</div>
                <div class="print-value">
                    {{ $customer->doj ? \Carbon\Carbon::parse($customer->doj)->format('d/m/Y') : '' }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">Date of Birth</div>
                <div class="print-value">
                    {{ $customer->dob ? \Carbon\Carbon::parse($customer->dob)->format('d/m/Y') : '' }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">Gender</div>
                <div class="print-value">
                    {{ $customer->gender }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">Marital Status</div>
                <div class="print-value">
                    {{ $customer->marital }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">No of Dependent</div>
                <div class="print-value">
                    {{ $customer->noOfDependent }}
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>