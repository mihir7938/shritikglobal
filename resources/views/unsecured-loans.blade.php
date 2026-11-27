@extends('layouts.site-app')
@section('meta_title', 'Unsecured Loan Options | Shritik Global India Private Limited')
@section('meta_description', 'Explore unsecured loan options including personal loans, business loans, MSME finance and unsecured working capital solutions with Shritik Global.')
@section('meta_keywords', 'Unsecured Loans, Unsecured Loan Options, Personal Loans, Unsecured Business Loans, MSME Finance, Working Capital Loans, Unsecured Business Finance, Shritik Global')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">
                Unsecured Loans
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
                            An unsecured loan generally does not require conventional asset collateral. The lender may rely more heavily on factors such as income, business cash flows, credit history, banking behaviour, business vintage, financial statements and repayment capacity. Unsecured does not mean guaranteed or risk-free; pricing and eligibility vary.
                        </p>
                    </div>
                    <div class="retail-loan-content">
                        <div class="retail-loan-item">
                            <h5 class="mb-2">Required Documents</h5>
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
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="retail-intro-image">
                        <img src="{{ asset('img/unsecure-loan.png') }}" class="img-fluid rounded" alt="Retail Loan Solutions">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection