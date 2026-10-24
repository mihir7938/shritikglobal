@extends('layouts.site-app')
@section('content')
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Loan Documents</h1>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" src="{{asset('img/secure_loan.png')}}" alt="">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h2 class="display-6 mb-4">Secure Loan</h2>
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
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="h-100">
                        <h2 class="display-6 mb-4">Unsecure Loan</h2>
                        <ul>
                            <li>Aadhaar Card – Applicant</li>
                            <li>PAN Card – Applicant</li>
                            <li>Income Proof</li>
                            <li>Ownership Proof</li>
                            <li>Other Loan SOA</li>
                            <li>Cheque</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <img class="img-fluid rounded" src="{{asset('img/unsecure_loan.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection