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
            html,
            body {
                margin: 0;
                padding: 0;
            }

            .page-break-before {
                page-break-before: always !important;
                break-before: page !important;
            }

            .print-section {
                page-break-inside: avoid !important;
                break-inside: avoid !important;
            }
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
            display: flex;
            align-items: center;
            width: 100%;
            margin: 22px 0 18px 0;
            page-break-inside: avoid;
            break-inside: avoid;
        }
        .print-section::before,
        .print-section::after {
            content: "";
            height: 1px;
            background: #007bff;
            flex: 1;
        }
        .print-section span {
            display: inline-block;
            background: #fff;
            border: 1px solid #007bff;
            color: #007bff;
            padding: 5px 14px;
            font-size: 12px;
            line-height: 1;
            white-space: nowrap;
            margin: 0 8px;
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
        <div class="print-section">
            <span>BANK DETAILS</span>
        </div>
        <div class="print-row">
            <div class="print-col-4">
                <div class="print-label">Bank Name</div>
                <div class="print-value">
                    {{ $customer->customerBankName }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">Account Type</div>
                <div class="print-value">
                    {{ ($customer->isSavingsAccount === null || $customer->isSavingsAccount === '') ? '' : ($customer->isSavingsAccount == 1 ? 'Savings' : 'Current') }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">Bank PDF</div>
                <div class="print-value">
                    @if($customer->bankDocumentPath)
                        Uploaded
                    @else
                        Not Uploaded
                    @endif
                </div>
            </div>
        </div>
        <div class="print-section">
            <span>PROFESSION</span>
        </div>
        <div class="print-row">
            <div class="print-col-4">
                <div class="print-label">Profession Type</div>
                <div class="print-value">
                    {{ $customer->profession_type }}
                </div>
            </div>
            @if($customer->profession_type == 'Job')
                <div class="print-col-4">
                    <div class="print-label">Job Type</div>
                    <div class="print-value">
                        {{ $customer->job_type }}
                    </div>
                </div>
            @endif
            <div class="print-col-4">
                <div class="print-label">Profession Details</div>
                <div class="print-value print-textarea">
                    {!! nl2br(e($customer->profession_details)) !!}
                </div>
            </div>
        </div>
        <div class="page-break-before">
            <div class="print-section">
                <span>ADDRESS (RESIDENTIAL)</span>
            </div>
            <div class="print-row">
                <div class="print-col-4">
                    <div class="print-label">Postal Address</div>
                    <div class="print-value">
                        {{ $customer->res_address }}
                    </div>
                </div>
                <div class="print-col-4">
                    <div class="print-label">Landmark</div>
                    <div class="print-value">
                        {{ $customer->res_landmark }}
                    </div>
                </div>
                <div class="print-col-4">
                    <div class="print-label">City</div>
                    <div class="print-value">
                        {{ $customer->res_city }}
                    </div>
                </div>
                <div class="print-col-4">
                    <div class="print-label">State</div>
                    <div class="print-value">
                        {{ $customer->res_state }}
                    </div>
                </div>
                <div class="print-col-4">
                    <div class="print-label">Zip</div>
                    <div class="print-value">
                        {{ $customer->res_pincode }}
                    </div>
                </div>
                <div class="print-col-4">
                    <div class="print-label">Property Type</div>
                    <div class="print-value">
                        {{ $customer->isOwned == 'true' ? 'Owned' : ($customer->isOwned == 'false' ? 'Rented' : '') }}
                    </div>
                </div>
                <div class="print-col-4">
                    <div class="print-label">Property Tax</div>
                    <div class="print-value">
                        {{ $customer->resPropertyTaxDoc ? 'Uploaded' : 'Not Uploaded' }}
                    </div>
                </div>
                <div class="print-col-4">
                    <div class="print-label">Light Bill</div>
                    <div class="print-value">
                        {{ $customer->resLightBillDoc ? 'Uploaded' : 'Not Uploaded' }}
                    </div>
                </div>
            </div>
        </div>
        <div class="print-section">
            <span>ADDRESS (PROPERTY)</span>
        </div>
        <div class="print-row">
            <div class="print-col-4">
                <div class="print-label">Postal Address</div>
                <div class="print-value">
                    {{ $customer->prop_address }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">Landmark</div>
                <div class="print-value">
                    {{ $customer->prop_landmark }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">City</div>
                <div class="print-value">
                    {{ $customer->prop_city }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">State</div>
                <div class="print-value">
                    {{ $customer->prop_state }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">Zip</div>
                <div class="print-value">
                    {{ $customer->prop_pincode }}
                </div>
            </div>
        </div>
        <div class="print-section">
            <span>CO APPLICANT DETAILS</span>
        </div>
        <div class="print-row">
            <div class="print-col-3">
                <div class="print-label">Full Name</div>
                <div class="print-value">
                    {{ $customer->co_fullname }}
                </div>
            </div>
            <div class="print-col-3">
                <div class="print-label">Relation</div>
                <div class="print-value">
                    {{ $customer->co_relation }}
                </div>
            </div>
            <div class="print-col-3">
                <div class="print-label">Date of Birth</div>
                <div class="print-value">
                    {{ $customer->co_dob ? \Carbon\Carbon::parse($customer->co_dob)->format('d/m/Y') : '' }}
                </div>
            </div>
            <div class="print-col-3">
                <div class="print-label">Mobile Number</div>
                <div class="print-value">
                    {{ $customer->co_mobile }}
                </div>
            </div>
            <div class="print-col-4">
                <div class="print-label">Profession Type</div>
                <div class="print-value">
                    {{ $customer->co_profession_type }}
                </div>
            </div>
            @if($customer->co_profession_type == 'Job')
                <div class="print-col-4">
                    <div class="print-label">Job Type</div>
                    <div class="print-value">
                        {{ $customer->co_job_type }}
                    </div>
                </div>
            @endif
            <div class="print-col-4">
                <div class="print-label">Profession Details</div>
                <div class="print-value print-textarea">
                    {!! nl2br(e($customer->co_profession_details)) !!}
                </div>
            </div>
        </div>
        <div class="print-section">
            <span>KYC DETAILS</span>
        </div>
        <div class="print-row">
            <div class="print-col-6">
                <div class="print-label">Aadhaar</div>
                <div class="print-value">
                    {{ $customer->aadhar }}
                </div>
            </div>
            <div class="print-col-6">
                <div class="print-label">Aadhaar Image</div>
                <div class="print-value">
                    {{ $customer->aadharImage ? 'Uploaded' : 'Not Uploaded' }}
                </div>
            </div>
            <div class="print-col-6">
                <div class="print-label">PAN Number</div>
                <div class="print-value">
                    {{ $customer->pan }}
                </div>
            </div>
            <div class="print-col-6">
                <div class="print-label">PAN Image</div>
                <div class="print-value">
                    {{ $customer->panImage ? 'Uploaded' : 'Not Uploaded' }}
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>