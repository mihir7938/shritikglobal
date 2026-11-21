@extends('layouts.site-app')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">
                Secured Loans
            </h1>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container-xxl py-4">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="retail-intro-content">
                        <p>
                            A secured loan is generally supported by collateral acceptable to the lender. The asset may be subject to valuation, legal due diligence, ownership verification and other checks. If repayment obligations are not met, the lender may have rights over the secured asset in accordance with the agreement and applicable law. Possible security categories, depending on product and lender: residential property, commercial property, industrial property, eligible machinery or equipment, vehicles, gold or eligible financial assets.
                        </p>
                    </div>
                    <div class="retail-loan-content">
                        <div class="retail-loan-item">
                            <h5 class="mb-2">Required Documents</h5>
                            <ul>
                                <li>Aadhaar Card – Applicant & Co-Applicant</li>
                                <li>PAN Card – Applicant & Co-Applicant</li>
                                <li>Photo – 3 + 3</li>
                                <li>Light Bill / Vera Bill</li>
                                <li>Banking – Latest 1 Year (Saving & Current A/C)</li>
                                <li>Cheque – 3</li>
                                <li>Other Loan SOA</li>
                                <li>Business Proof</li>
                                <li>ITR – Latest 3 Year</li>
                                <li>Job – Salary Slip 6 Month Latest / Letter Pad</li>
                                <li>Property Paper</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="retail-intro-image">
                        <img src="{{ asset('img/secure_loan.png') }}" class="img-fluid rounded" alt="Retail Loan Solutions">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection