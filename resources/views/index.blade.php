@extends('layouts.site-app')
@section('content')
	<!-- Hero Carousel Start -->
	<div class="container-fluid p-0 mb-5 hero-carousel-wrapper">
	    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="6000">
	        <div class="carousel-inner">
	            <div class="carousel-item active">
	                <img class="hero-slide-img" src="{{ asset('img/banner-1.jpeg') }}" alt="Financial Solutions">
	                <div class="hero-overlay"></div>
	                <div class="carousel-caption">
	                    <div class="container">
	                        <div class="hero-content">
	                            <span class="hero-eyebrow animated fadeInDown">
	                                FINANCIAL SOLUTIONS | RETAIL TO ENTERPRISE
	                            </span>
	                            <h1 class="hero-heading animated zoomIn">
	                                Financial Solutions for Every Need. Funding Opportunities for Every Ambition.
	                            </h1>
	                            <h5 class="hero-tagline animated fadeInUp">
	                                Retail to Enterprise. Secured to Unsecured. One Financial Solutions Partner.
	                            </h5>
	                            <div class="hero-buttons animated fadeInUp">
	                                <a href="{{ route('services') }}" class="btn btn-primary rounded-pill">
	                                    Explore Loan Solutions
	                                    <i class="fa fa-arrow-right ms-2"></i>
	                                </a>
	                                <a href="{{ route('contact') }}" class="btn btn-outline-light rounded-pill">
	                                    Discuss Your Requirement
	                                </a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="carousel-item">
	                <img class="hero-slide-img" src="{{ asset('img/banner-2.png') }}" alt="Retail and Personal Finance">
	                <div class="hero-overlay"></div>
	                <div class="carousel-caption">
	                    <div class="container">
	                        <div class="hero-content">
	                            <span class="hero-eyebrow animated fadeInDown">
	                                PERSONAL FINANCE | HOME & VEHICLE
	                            </span>
	                            <h1 class="hero-heading animated zoomIn">
	                                Move Forward with the Right Financial Support.
	                            </h1>
	                            <h5 class="hero-tagline animated fadeInUp">
	                                Your Goals. Your Requirements. Relevant Financial Possibilities.
	                            </h5>
	                            <div class="hero-buttons animated fadeInUp">
	                                <a href="{{ route('services') }}" class="btn btn-primary rounded-pill">
	                                    Explore Loan Solutions
	                                    <i class="fa fa-arrow-right ms-2"></i>
	                                </a>
	                                <a href="{{ route('contact') }}" class="btn btn-outline-light rounded-pill">
	                                    Discuss Your Requirement
	                                </a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="carousel-item">
	                <img class="hero-slide-img" src="{{ asset('img/banner-3.png') }}" alt="Business and Enterprise Finance">
	                <div class="hero-overlay"></div>
	                <div class="carousel-caption">
	                    <div class="container">
	                        <div class="hero-content">
	                            <span class="hero-eyebrow animated fadeInDown">
	                                MSME FUNDING | CORPORATE FINANCE
	                            </span>
	                            <h1 class="hero-heading animated zoomIn">
	                                Supporting Business Growth at Every Scale.
	                            </h1>
	                            <h5 class="hero-tagline animated fadeInUp">
	                                Empowering Businesses. Exploring Growth Opportunities.
	                            </h5>
	                            <div class="hero-buttons animated fadeInUp">
	                                <a href="{{ route('services') }}" class="btn btn-primary rounded-pill">
	                                    Explore Loan Solutions
	                                    <i class="fa fa-arrow-right ms-2"></i>
	                                </a>
	                                <a href="{{ route('contact') }}" class="btn btn-outline-light rounded-pill">
	                                    Discuss Your Requirement
	                                </a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
	            data-bs-slide="prev">
	            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	            <span class="visually-hidden">Previous</span>
	        </button>
	        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
	            data-bs-slide="next">
	            <span class="carousel-control-next-icon" aria-hidden="true"></span>
	            <span class="visually-hidden">Next</span>
	        </button>
	    </div>
	</div>
	<!-- Hero Carousel End -->
	<!-- Facts Start -->
	{{--<div class="container-xxl py-5">
	    <div class="container">
	        <div class="row g-4">
	            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
	                <div class="fact-item bg-light rounded text-center h-100 p-5">
	                    <i class="fa fa-certificate fa-4x text-primary mb-4"></i>
	                    <h5 class="mb-3">Years Experience</h5>
	                    <h1 class="display-5 mb-0" data-toggle="counter-up">1234</h1>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
	                <div class="fact-item bg-light rounded text-center h-100 p-5">
	                    <i class="fa fa-users-cog fa-4x text-primary mb-4"></i>
	                    <h5 class="mb-3">Team Members</h5>
	                    <h1 class="display-5 mb-0" data-toggle="counter-up">1234</h1>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
	                <div class="fact-item bg-light rounded text-center h-100 p-5">
	                    <i class="fa fa-users fa-4x text-primary mb-4"></i>
	                    <h5 class="mb-3">Satisfied Clients</h5>
	                    <h1 class="display-5 mb-0" data-toggle="counter-up">1234</h1>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
	                <div class="fact-item bg-light rounded text-center h-100 p-5">
	                    <i class="fa fa-check fa-4x text-primary mb-4"></i>
	                    <h5 class="mb-3">Projects Done</h5>
	                    <h1 class="display-5 mb-0" data-toggle="counter-up">1234</h1>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>--}}
	<!-- Facts End -->
	<!-- About Start -->
	<div class="container-xxl py-5">
	    <div class="container">
	        <div class="row g-5">
	            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
	                <div class="img-border">
	                    <img class="img-fluid" src="img/about.jpg" alt="">
	                </div>
	            </div>
	            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
	                <div class="h-100">
	                    <h6 class="section-title bg-white text-start text-primary pe-3">Who we are</h6>
	                    <h2 class="display-6 mb-4">A Financial Solutions Partner for Different Needs</h2>
	                    <p>Financial requirements are not the same for everyone. An individual may be planning a home purchase or managing a personal financial need. A professional may be considering a vehicle or balance transfer. A business owner may need working capital, machinery finance or expansion funding. An enterprise may be evaluating a structured or project-related funding requirement.</p>
						<p class="mb-4">Shritik Global India Private Limited aims to bring these requirements into one organised financial-solutions ecosystem. We listen to the requirement, understand the broad customer profile and help explore relevant financing routes through appropriate institutions and partners, subject to product availability and applicable arrangements.
						</p>
	                    <a class="btn btn-primary rounded-pill py-3 px-5" href="{{route('about')}}">Read More</a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- About End -->
	<!-- Service Start -->
	<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Loan Solutions</h6>
                <h2 class="display-6 mb-4">Explore Comprehensive Financing Solutions</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="{{route('retail_loans')}}">
                        <img class="img-fluid rounded mb-4" src="{{asset('img/service-1.png')}}" alt="">
                        <h5 class="mb-0">Retail Loans</h5>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="{{route('business_loans')}}">
                        <img class="img-fluid rounded mb-4" src="{{asset('img/service-2.png')}}" alt="">
                        <h5 class="mb-0">Business & MSME Loans</h5>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="{{route('startup_loans')}}">
                        <img class="img-fluid rounded mb-4" src="{{asset('img/service-3.png')}}" alt="">
                        <h5 class="mb-0">Startup & Entrepreneur</h5>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="{{route('corporate_loans')}}">
                        <img class="img-fluid rounded mb-4" src="img/service-4.jpg" alt="">
                        <h5 class="mb-0">Corporate & Enterprise</h5>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="{{route('secured_loans')}}">
                        <img class="img-fluid rounded mb-4" src="img/service-5.jpg" alt="">
                        <h5 class="mb-0">Secured Loans</h5>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="{{route('unsecured_loans')}}">
                        <img class="img-fluid rounded mb-4" src="img/service-6.jpg" alt="">
                        <h5 class="mb-0">Unsecured Loans</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
	<!-- Service End -->
	<!-- WHY CUSTOMERS ENGAGE WITH US -->
	<div class="sg-why-section container-xxl py-5">
	    <div class="container">
	    	<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 750px;">
	            <h6 class="section-title bg-white text-center text-primary px-3">WHY CHOOSE US</h6>
	            <h2 class="display-6 mb-4">Why Customers Engage With Us</h2>
	            <p class="text-muted mb-0">
	                We focus on understanding customer requirements, providing
	                structured guidance and making the financing journey easier
	                to understand.
	            </p>
	        </div>
	        <div class="row g-4">
	            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
	                <div class="sg-why-card h-100">
	                    <div class="sg-why-icon">
	                        <i class="fas fa-comments"></i>
	                    </div>
	                    <h5>Requirement-First Conversations</h5>
	                    <p>
	                        We understand your purpose, funding amount, timing
	                        and broad financial context before discussing
	                        possible financing routes.
	                    </p>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
	                <div class="sg-why-card h-100">
	                    <div class="sg-why-icon">
	                        <i class="fas fa-layer-group"></i>
	                    </div>
	                    <h5>Retail-to-Enterprise Coverage</h5>
	                    <p>
	                        We work across multiple customer segments and
	                        financing categories under one company identity.
	                    </p>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
	                <div class="sg-why-card h-100">
	                    <div class="sg-why-icon">
	                        <i class="fas fa-shield-alt"></i>
	                    </div>
	                    <h5>Secured &amp; Unsecured Options</h5>
	                    <p>
	                        We explore different financing structures where
	                        suitable products and partner arrangements exist.
	                    </p>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
	                <div class="sg-why-card h-100">
	                    <div class="sg-why-icon">
	                        <i class="fas fa-file-alt"></i>
	                    </div>
	                    <h5>Structured Coordination</h5>
	                    <p>
	                        We help make information gathering, documentation
	                        and the next steps easier to understand.
	                    </p>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
	                <div class="sg-why-card h-100">
	                    <div class="sg-why-icon">
	                        <i class="fas fa-handshake"></i>
	                    </div>
	                    <h5>Clear Communication</h5>
	                    <p>
	                        We explain the process transparently, including
	                        that product terms and final credit decisions
	                        belong to the relevant lender.
	                    </p>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
	                <div class="sg-why-card h-100">
	                    <div class="sg-why-icon">
	                        <i class="fas fa-user-tie"></i>
	                    </div>
	                    <h5>Relationship-Led Approach</h5>
	                    <p>
	                        We value professional conduct, confidentiality
	                        and consistent communication throughout the
	                        customer relationship.
	                    </p>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- HOW IT WORKS -->
	<div class="sg-process-section container-xxl py-5">
	    <div class="container">
	    	<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 750px;">
	            <h6 class="section-title bg-white text-center text-primary px-3">OUR PROCESS</h6>
	            <h2 class="display-6 mb-4">How It Works</h2>
	            <p class="text-muted mb-0">
	                A simple and structured approach to understanding
	                your financing requirements and exploring possible options.
	            </p>
	        </div>
	        <div class="row g-4">
	            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
	                <div class="sg-process-card h-100">
	                    <div class="sg-step-number">01</div>
	                    <div class="sg-process-icon">
	                        <i class="fas fa-edit"></i>
	                    </div>
	                    <h5>Tell Us What You Need</h5>
	                    <p>
	                        Submit a short enquiry with your contact details
	                        and broad financing requirement.
	                    </p>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
	                <div class="sg-process-card h-100">
	                    <div class="sg-step-number">02</div>
	                    <div class="sg-process-icon">
	                        <i class="fas fa-comments"></i>
	                    </div>
	                    <h5>Initial Conversation</h5>
	                    <p>
	                        We clarify your purpose, required amount,
	                        location and applicant profile.
	                    </p>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
	                <div class="sg-process-card h-100">
	                    <div class="sg-step-number">03</div>
	                    <div class="sg-process-icon">
	                        <i class="fas fa-search-dollar"></i>
	                    </div>
	                    <h5>Option Exploration</h5>
	                    <p>
	                        We explore potential financing routes based on
	                        available products and preliminary information.
	                    </p>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
	                <div class="sg-process-card h-100">
	                    <div class="sg-step-number">04</div>
	                    <div class="sg-process-icon">
	                        <i class="fas fa-folder-open"></i>
	                    </div>
	                    <h5>Documentation Guidance</h5>
	                    <p>
	                        We explain the documents requested for the
	                        relevant financing process.
	                    </p>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
	                <div class="sg-process-card h-100">
	                    <div class="sg-step-number">05</div>
	                    <div class="sg-process-icon">
	                        <i class="fas fa-university"></i>
	                    </div>
	                    <h5>Lender or Partner Assessment</h5>
	                    <p>
	                        The relevant institution conducts its own checks
	                        and makes the final credit decision.
	                    </p>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
	                <div class="sg-process-card h-100">
	                    <div class="sg-step-number">06</div>
	                    <div class="sg-process-icon">
	                        <i class="fas fa-headset"></i>
	                    </div>
	                    <h5>Updates &amp; Next Steps</h5>
	                    <p>
	                        We provide communication and coordination
	                        in line with the agreed process and our role.
	                    </p>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- INDUSTRIES -->
	<div class="container-xxl py-5">
	    <div class="container">
	        <div class="row g-5">
	            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
	                <div class="h-100">
	                    <h6 class="section-title bg-white text-start text-primary pe-3">INDUSTRIES WE SERVE</h6>
	                    <h2 class="display-6 mb-4">Financial Perspectives Across Diverse Industries</h2>
	                    <p class="mb-2">Understanding industry-specific business models, cash-flow cycles, asset requirements and funding objectives helps us explore relevant financial possibilities.</p>
	                    <ul class="mb-4">
	                    	<li>Manufacturing & Engineering</li>
	                    	<li>Textile & Processing</li>
	                    	<li>Trading & Distribution</li>
	                    	<li>Retail & Wholesale</li>
	                    	<li>Logistics & Transportation</li>
	                    	<li>Healthcare & Professional Services</li>
	                    	<li>Real Estate & Construction</li>
	                    	<li>Infrastructure & Projects</li>
	                    	<li>Emerging Businesses</li>
	                    </ul>
	                    <a class="btn btn-primary rounded-pill py-3 px-5" href="{{route('about')}}">Read More</a>
	                </div>
	            </div>
	            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
	                <div class="img-border">
	                    <img class="img-fluid" src="img/feature.jpg" alt="">
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="container-xxl py-5">
	    <div class="container">
	        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
	            <h6 class="section-title bg-white text-center text-primary px-3">Our Financial Partners</h6>
	            <h1 class="display-6 mb-4">We Associate With</h1>
	        </div>
	        <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
	            <div class="project-item border rounded h-100 p-3" data-dot="01">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank1.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="02">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank2.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="03">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank3.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="04">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank4.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="05">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank5.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="06">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank6.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="07">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank7.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="08">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank8.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="09">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank9.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="10">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank10.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="11">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank11.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="12">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank12.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="13">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank13.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="14">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank14.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="15">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank15.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="16">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank16.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="17">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank17.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="18">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank18.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="19">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank19.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="20">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank20.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="21">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank21.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="22">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank22.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="23">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank23.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="24">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank24.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="25">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank25.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="26">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank26.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="27">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank27.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="28">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank28.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="29">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank29.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="30">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank30.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="31">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank31.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="32">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank32.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="33">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank33.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="34">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank34.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="35">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank35.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="36">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank36.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="37">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank37.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="38">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank38.png')}}" alt="">
	                </div>
	            </div>
	            <div class="project-item border rounded h-100 p-3" data-dot="39">
	                <div class="position-relative">
	                    <img class="img-fluid rounded" src="{{asset('img/bank39.png')}}" alt="">
	                </div>
	            </div>
	        </div>
	        <div class="text-center mx-auto mt-5 wow fadeInUp" data-wow-delay="0.3s">
	            <a class="btn btn-primary rounded-pill py-3 px-5" href="{{route('partners')}}">More Partners</a>
	        </div>
	    </div>
	</div>
	<!-- Team Start -->
	{{--<div class="container-xxl py-5">
	    <div class="container">
	        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
	            <h6 class="section-title bg-white text-center text-primary px-3">Our Team</h6>
	            <h1 class="display-6 mb-4">We Are A Creative Team For Your Dream Project</h1>
	        </div>
	        <div class="row g-4">
	            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
	                <div class="team-item text-center p-4">
	                    <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="img/team-1.jpg" alt="">
	                    <div class="team-text">
	                        <div class="team-title">
	                            <h5>Full Name</h5>
	                            <span>Designation</span>
	                        </div>
	                        <div class="team-social">
	                            <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
	                            <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-twitter"></i></a>
	                            <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-instagram"></i></a>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
	                <div class="team-item text-center p-4">
	                    <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="img/team-2.jpg" alt="">
	                    <div class="team-text">
	                        <div class="team-title">
	                            <h5>Full Name</h5>
	                            <span>Designation</span>
	                        </div>
	                        <div class="team-social">
	                            <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
	                            <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-twitter"></i></a>
	                            <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-instagram"></i></a>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
	                <div class="team-item text-center p-4">
	                    <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="img/team-3.jpg" alt="">
	                    <div class="team-text">
	                        <div class="team-title">
	                            <h5>Full Name</h5>
	                            <span>Designation</span>
	                        </div>
	                        <div class="team-social">
	                            <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
	                            <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-twitter"></i></a>
	                            <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-instagram"></i></a>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>--}}
	<!-- Team End -->
	<!-- Testimonial Start -->
	{{--<div class="container-xxl py-5">
	    <div class="container">
	        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
	            <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
	            <h1 class="display-6 mb-4">What Our Clients Say!</h1>
	        </div>
	        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
	            <div class="testimonial-item bg-light rounded p-4">
	                <div class="d-flex align-items-center mb-4">
	                    <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-1.jpg" alt="">
	                    <div class="ms-4">
	                        <h5 class="mb-1">Client Name</h5>
	                        <span>Profession</span>
	                    </div>
	                </div>
	                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
	            </div>
	            <div class="testimonial-item bg-light rounded p-4">
	                <div class="d-flex align-items-center mb-4">
	                    <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-2.jpg" alt="">
	                    <div class="ms-4">
	                        <h5 class="mb-1">Client Name</h5>
	                        <span>Profession</span>
	                    </div>
	                </div>
	                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
	            </div>
	            <div class="testimonial-item bg-light rounded p-4">
	                <div class="d-flex align-items-center mb-4">
	                    <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-3.jpg" alt="">
	                    <div class="ms-4">
	                        <h5 class="mb-1">Client Name</h5>
	                        <span>Profession</span>
	                    </div>
	                </div>
	                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
	            </div>
	            <div class="testimonial-item bg-light rounded p-4">
	                <div class="d-flex align-items-center mb-4">
	                    <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-4.jpg" alt="">
	                    <div class="ms-4">
	                        <h5 class="mb-1">Client Name</h5>
	                        <span>Profession</span>
	                    </div>
	                </div>
	                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
	            </div>
	        </div>
	    </div>
	</div>--}}
	<!-- Testimonial End -->
	
	<!-- FAQ Section Start -->
	<div class="container-xxl faq-section py-5">
	    <div class="container">
	    	<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
	            <h6 class="section-title bg-white text-center text-primary px-3">Frequently Asked Questions</h6>
	            <h1 class="display-6 mb-4">Have Any Questions?</h1>
	        </div>
	        <div class="row justify-content-center">
	            <div class="col-lg-9">
	                <div class="accordion faq-accordion" id="faqAccordion">
	                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.1s">
	                        <h2 class="accordion-header" id="faqHeadingOne">
	                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="true" aria-controls="faqOne">
	                                Does Shritik Global help with both secured and unsecured loans?
	                            </button>
	                        </h2>
	                        <div id="faqOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
	                            <div class="accordion-body">
	                                The company focuses on helping customers explore both secured and unsecured financing options across retail, business and enterprise categories, subject to active product availability and applicable arrangements.
	                            </div>
	                        </div>
	                    </div>
	                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
	                        <h2 class="accordion-header" id="faqHeadingTwo">
	                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false" aria-controls="faqTwo">
	                                Can salaried individuals enquire?
	                            </button>
	                        </h2>
	                        <div id="faqTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#faqAccordion">
	                            <div class="accordion-body">
	                                Yes. Individuals and salaried professionals may submit enquiries for retail loan categories supported by the company's available lender or partner arrangements.
	                            </div>
	                        </div>
	                    </div>
	                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.3s">
	                        <h2 class="accordion-header" id="faqHeadingThree">
	                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree" aria-expanded="false" aria-controls="faqThree">
	                                Can self-employed individuals and business owners enquire?
	                            </button>
	                        </h2>
	                        <div id="faqThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#faqAccordion">
	                            <div class="accordion-body">
	                                Yes. They may enquire about relevant personal, business or MSME financing options. Eligibility is determined by the relevant lender.
	                            </div>
	                        </div>
	                    </div>
	                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.4s">
	                        <h2 class="accordion-header" id="faqHeadingFour">
	                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFour" aria-expanded="false" aria-controls="faqFour">
	                                Can a customer get a loan without collateral?
	                            </button>
	                        </h2>
	                        <div id="faqFour" class="accordion-collapse collapse" aria-labelledby="faqHeadingFour" data-bs-parent="#faqAccordion">
	                            <div class="accordion-body">
	                                Some products may not require conventional collateral. Approval, amount, pricing and terms depend on lender criteria and the applicant's profile.
	                            </div>
	                        </div>
	                    </div>
	                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.5s">
	                        <h2 class="accordion-header" id="faqHeadingFive">
	                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFive" aria-expanded="false" aria-controls="faqFive">
	                                Is loan approval guaranteed after submitting the website form?
	                            </button>
	                        </h2>
	                        <div id="faqFive" class="accordion-collapse collapse" aria-labelledby="faqHeadingFive" data-bs-parent="#faqAccordion">
	                            <div class="accordion-body">
	                                No. An enquiry is not an approval or commitment to lend. The relevant lender conducts its own assessment and makes the final decision.
	                            </div>
	                        </div>
	                    </div>
	                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.6s">
	                        <h2 class="accordion-header" id="faqHeadingSix">
	                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqSix" aria-expanded="false" aria-controls="faqSix">
	                                What documents are needed?
	                            </button>
	                        </h2>
	                        <div id="faqSix" class="accordion-collapse collapse" aria-labelledby="faqHeadingSix" data-bs-parent="#faqAccordion">
	                            <div class="accordion-body">
	                                Documents vary by loan product and lender. They may include identity and address proof, income or business records, bank statements, tax returns, financial statements and property documents where relevant.
	                            </div>
	                        </div>
	                    </div>
	                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.7s">
	                        <h2 class="accordion-header" id="faqHeadingSeven">
	                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqSeven" aria-expanded="false" aria-controls="faqSeven">
	                                Will submitting an enquiry affect my credit score?
	                            </button>
	                        </h2>
	                        <div id="faqSeven" class="accordion-collapse collapse" aria-labelledby="faqHeadingSeven" data-bs-parent="#faqAccordion">
	                            <div class="accordion-body">
	                                A basic enquiry should not be represented as a credit bureau check. Any credit bureau enquiry or lender application should be explained to the customer and carried out only through the relevant authorised process and consent.
	                            </div>
	                        </div>
	                    </div>
	                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s">
	                        <h2 class="accordion-header" id="faqHeadingEight">
	                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqEight" aria-expanded="false" aria-controls="faqEight">
	                                How long does approval take?
	                            </button>
	                        </h2>
	                        <div id="faqEight" class="accordion-collapse collapse" aria-labelledby="faqHeadingEight" data-bs-parent="#faqAccordion">
	                            <div class="accordion-body">
	                                Timelines vary by lender, product, documentation, verification and case complexity. Do not promise a fixed approval or disbursement timeline unless a verified product-specific commitment exists.
	                            </div>
	                        </div>
	                    </div>
	                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.9s">
	                        <h2 class="accordion-header" id="faqHeadingNine">
	                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqNine" aria-expanded="false" aria-controls="faqNine">
	                                How can I contact the team?
	                            </button>
	                        </h2>
	                        <div id="faqNine" class="accordion-collapse collapse" aria-labelledby="faqHeadingNine" data-bs-parent="#faqAccordion">
	                            <div class="accordion-body">
	                                Use the contact details and enquiry form published on the official website. Insert only verified company contact information.
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- FAQ Section End -->

	<!-- Closing CTA Start -->
	<div class="sg-closing-cta">
	    <div class="container">
	        <div class="sg-cta-content text-center">
	            <div class="sg-cta-icon wow fadeInUp" data-wow-delay="0.1s"><i class="fas fa-handshake"></i></div>
	            <h2 class="wow fadeInUp" data-wow-delay="0.1s">
	                Your Next Financial Step Starts
	                <span>With the Right Conversation.</span>
	            </h2>
	            <p class="wow fadeInUp" data-wow-delay="0.1s">
	                Tell us what you are looking to finance. Connect with
	                Shritik Global India Private Limited to discuss your
	                requirement and understand the next steps.
	            </p>
	            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s">
		            <a class="btn btn-primary rounded-pill py-3 px-5" href="{{route('contact')}}">Submit Your Enquiry</a>
		        </div>
	        </div>
	    </div>
	</div>
	<!-- Closing CTA End -->
@endsection