@extends('layouts.site-app')
@section('content')
	<!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Loan Solutions</h1>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item d-block rounded text-center h-100 p-4">
                        <img class="img-fluid rounded mb-4" src="{{asset('img/service-1.png')}}" alt="">
                        <h5 class="mb-0">Retail Loans</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item d-block rounded text-center h-100 p-4">
                        <img class="img-fluid rounded mb-4" src="{{asset('img/service-2.png')}}" alt="">
                        <h5 class="mb-0">Business & MSME Loans</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item d-block rounded text-center h-100 p-4">
                        <img class="img-fluid rounded mb-4" src="{{asset('img/service-3.png')}}" alt="">
                        <h5 class="mb-0">Startup & Entrepreneur</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="">
                        <img class="img-fluid rounded mb-4" src="img/service-4.jpg" alt="">
                        <h5 class="mb-0">Corporate & Enterprise</h5>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="">
                        <img class="img-fluid rounded mb-4" src="img/service-5.jpg" alt="">
                        <h5 class="mb-0">Secured Loans</h5>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="">
                        <img class="img-fluid rounded mb-4" src="img/service-6.jpg" alt="">
                        <h5 class="mb-0">Unsecured Loans</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection