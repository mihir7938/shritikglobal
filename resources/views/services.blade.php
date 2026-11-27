@extends('layouts.site-app')
@section('meta_title', 'Loan Solutions | Retail, Business & Corporate Finance')
@section('meta_description', 'Explore personal loans, home loans, business loans, MSME finance, working capital, secured loans and unsecured loan solutions with Shritik Global.')
@section('meta_keywords', 'Loan Solutions, Personal Loan, Home Loan, Business Loan, MSME Loan, Working Capital, Corporate Loan, Secured Loan, Unsecured Loan')
@section('content')
	<!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Loan Solutions</h1>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Loan Solutions</h6>
                <h2 class="display-6 mb-4">Explore Comprehensive Financing Solutions</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="{{route('retail_loans')}}">
                        <img class="img-fluid rounded mb-4" src="{{asset('img/service-1.png')}}" alt="Retail Loans">
                        <h5 class="mb-0">Retail Loans</h5>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="{{route('business_loans')}}">
                        <img class="img-fluid rounded mb-4" src="{{asset('img/business-MSME-finance.png')}}" alt="Business & MSME Loans">
                        <h5 class="mb-0">Business & MSME Loans</h5>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="{{route('startup_loans')}}">
                        <img class="img-fluid rounded mb-4" src="{{asset('img/startup-entrepreneur-finance.png')}}" alt="Startup & Entrepreneur">
                        <h5 class="mb-0">Startup & Entrepreneur</h5>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="{{route('corporate_loans')}}">
                        <img class="img-fluid rounded mb-4" src="img/corporate-enterprise-finance.png" alt="Corporate & Enterprise">
                        <h5 class="mb-0">Corporate & Enterprise</h5>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="{{route('secured_loans')}}">
                        <img class="img-fluid rounded mb-4" src="img/secure-loan.png" alt="Secured Loans">
                        <h5 class="mb-0">Secured Loans</h5>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="{{route('unsecured_loans')}}">
                        <img class="img-fluid rounded mb-4" src="img/unsecure-loan.png" alt="Unsecured Loans">
                        <h5 class="mb-0">Unsecured Loans</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection