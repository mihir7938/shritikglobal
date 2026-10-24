@extends('layouts.site-app')
@section('content')
	<!-- Carousel Start -->
	<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
	    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
	        {{--<div class="carousel-indicators">
	            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
	                <img class="img-fluid" src="img/carousel-1.jpg" alt="Image">
	            </button>
	            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1" aria-label="Slide 2">
	                <img class="img-fluid" src="img/carousel-2.jpg" alt="Image">
	            </button>
	            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="2" aria-label="Slide 3">
	                <img class="img-fluid" src="img/carousel-3.jpg" alt="Image">
	            </button>
	        </div>--}}
	        <div class="carousel-inner">
	            <div class="carousel-item active">
	                <img class="w-100" src="img/banner-1.jpeg" alt="Image">
	                <div class="carousel-caption">
	                    <div class="p-3" style="max-width: 900px;">
	                        {{--<h4 class="text-white text-uppercase mb-4 animated zoomIn">We Are Leader In</h4>--}}
	                        <h2 class="display-4 text-white mb-0 animated zoomIn">Specialized in Loan, Real Estate and Automobile</h2>
	                    </div>
	                </div>
	            </div>
	            <div class="carousel-item">
	                <img class="w-100" src="img/banner-2.png" alt="Image">
	                <div class="carousel-caption">
	                    <div class="p-3" style="max-width: 900px;">
	                        {{--<h4 class="text-white text-uppercase mb-4 animated zoomIn">We Are Leader In</h4>--}}
	                        <h1 class="display-4 text-white mb-0 animated zoomIn">Empower your financial dreams with our Loan Services</h1>
	                    </div>
	                </div>
	            </div>
	            <div class="carousel-item">
	                <img class="w-100" src="img/banner-3.png" alt="Image">
	                <div class="carousel-caption">
	                    <div class="p-3" style="max-width: 900px;">
	                        {{--<h4 class="text-white text-uppercase mb-4 animated zoomIn">We Are Leader In</h4>--}}
	                        <h1 class="display-4 text-white mb-0 animated zoomIn">Ride your dreams with our Auto Mobile Services</h1>
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
	<!-- Carousel End -->


	<!-- Facts Start -->
	<div class="container-xxl py-5">
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
	</div>
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
	                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
	                    <h2 class="display-6 mb-4">Welcome to <span class="text-primary">Shritikglobal</span></h2>
	                    <p>We're delighted to welcome you to Shritikglobal, where your vision meets our expertise. As you explore our website, you're embarking on a journey towards achieving your goals, making informed decisions, and experiencing excellence.</p>
	                    <p class="mb-4">At Shritikglobal, we're dedicated to delivering top-notch consultancy services tailored to your unique needs. Whether you're an individual seeking career guidance, an organization looking to enhance efficiency, or an entrepreneur with ambitious dreams, we're here to empower you.</p>
	                    <div class="d-flex align-items-center mb-4 pb-2">
	                        <img class="flex-shrink-0 rounded-circle" src="img/team-1.jpg" alt="" style="width: 50px; height: 50px;">
	                        <div class="ps-4">
	                            <h6>HEMANT SRIVASTAV</h6>
	                            <small>CEO & Founder</small>
	                        </div>
	                    </div>
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
                <h6 class="section-title bg-white text-center text-primary px-3">Services</h6>
                <h1 class="display-6 mb-4">We Focuse On Making The Best In All Sectors</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item d-block rounded text-center h-100 p-4">
                        <img class="img-fluid rounded mb-4" src="{{asset('img/service-1.png')}}" alt="">
                        <h4 class="mb-0">Loan</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item d-block rounded text-center h-100 p-4">
                        <img class="img-fluid rounded mb-4" src="{{asset('img/service-2.png')}}" alt="">
                        <h4 class="mb-0">Automobile</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item d-block rounded text-center h-100 p-4">
                        <img class="img-fluid rounded mb-4" src="{{asset('img/service-3.png')}}" alt="">
                        <h4 class="mb-0">Real Estate</h4>
                    </div>
                </div>
                {{--<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="">
                        <img class="img-fluid rounded mb-4" src="img/service-4.jpg" alt="">
                        <h4 class="mb-0">Social Marketing</h4>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="">
                        <img class="img-fluid rounded mb-4" src="img/service-5.jpg" alt="">
                        <h4 class="mb-0">Email Marketing</h4>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="">
                        <img class="img-fluid rounded mb-4" src="img/service-6.jpg" alt="">
                        <h4 class="mb-0">PPC Advertising</h4>
                    </a>
                </div>--}}
            </div>
        </div>
    </div>
	<!-- Service End -->


	<!-- Feature Start -->
	<div class="container-xxl py-5">
	    <div class="container">
	        <div class="row g-5">
	            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
	                <div class="h-100">
	                    <h6 class="section-title bg-white text-start text-primary pe-3">Why Choose Us</h6>
	                    <h2 class="display-6 mb-4">Why People Trust Us? Learn About Us!</h2>
	                    {{--<p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>--}}
	                    <ul class="mb-4">
	                    	<li>Explore a comprehensive range of services designed to address your challenges.</li>
	                    	<li>Discover how we've overcome obstacles and achieve remarkable outcomes.</li>
	                    	<li>We understand your needs, and guide you towards success.</li>
	                    </ul>
	                    <a class="btn btn-primary rounded-pill py-3 px-5" href="{{route('about')}}">Read More</a>
	                    {{--<div class="row g-4">
	                        <div class="col-12">
	                            <div class="skill">
	                                <div class="d-flex justify-content-between">
	                                    <p class="mb-2">Digital Marketing</p>
	                                    <p class="mb-2">85%</p>
	                                </div>
	                                <div class="progress">
	                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="col-12">
	                            <div class="skill">
	                                <div class="d-flex justify-content-between">
	                                    <p class="mb-2">SEO & Backlinks</p>
	                                    <p class="mb-2">90%</p>
	                                </div>
	                                <div class="progress">
	                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="col-12">
	                            <div class="skill">
	                                <div class="d-flex justify-content-between">
	                                    <p class="mb-2">Design & Development</p>
	                                    <p class="mb-2">95%</p>
	                                </div>
	                                <div class="progress">
	                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>--}}
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
	<!-- Feature End -->
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
	<div class="container-xxl py-5">
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
	</div>
	<!-- Team End -->


	<!-- Testimonial Start -->
	<div class="container-xxl py-5">
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
	</div>
	<!-- Testimonial End -->
@endsection