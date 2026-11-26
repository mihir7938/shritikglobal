@extends('layouts.site-app')
@section('meta_title', 'Submit Loan Enquiry | Shritik Global India Private Limited')
@section('meta_description', 'Submit your financial requirement to Shritik Global. Share your details to discuss personal loans, business finance, MSME funding and corporate financing options.')
@section('meta_keywords', 'Loan Enquiry, Apply for Loan Enquiry, Business Loan Enquiry, Personal Loan Enquiry, MSME Finance Enquiry, Shritik Global')
@section('content')
	<!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Lead Enquiry</h1>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 700px;">
                <h6 class="section-title bg-white text-center text-primary px-3">GET IN TOUCH</h6>
                <h2 class="display-6 mb-4">Tell Us What You Are Looking to Finance</h2>
                <p>Share your basic details and requirement. Our team will use this information to understand your enquiry and contact you about possible next steps.</p>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.5s">
                    <form id="enquiry-form" name="enquiry-form" class="sg-enquiry-form" action="{{ route('save.enquiry') }}" method="POST">
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
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter your full name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter 10-digit mobile number">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">I Am Enquiring As <span class="text-danger">*</span></label>
                                <select class="form-select" id="applicant_type" name="applicant_type">
                                    <option value="">Select Applicant Type</option>
                                    <option value="Salaried">Salaried</option>
                                    <option value="Self-employed">Self-employed</option>
                                    <option value="Individual">Individual</option>
                                    <option value="Business owner">Business owner</option>
                                    <option value="MSME">MSME</option>
                                    <option value="Startup">Startup</option>
                                    <option value="Company">Company</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Loan Category <span class="text-danger">*</span></label>
                                <select class="form-select" id="loan_category" name="loan_category">
                                    <option value="">Select Loan Category</option>
                                    <option value="Retail">Retail</option>
                                    <option value="Business">Business</option>
                                    <option value="MSME">MSME</option>
                                    <option value="Corporate & Enterprise">Corporate & Enterprise</option>
                                    <option value="Secured">Secured</option>
                                    <option value="Unsecured">Unsecured</option>
                                    <option value="Not sure">Not sure</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Loan Product <span class="text-danger">*</span></label>
                                <select class="form-select" id="loan_product" name="loan_product">
                                    <option value="">Select Loan Product</option>
                                    @foreach($sub_products as $sub_product)
                                        <option value="{{$sub_product->name}}">{{$sub_product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Approximate Amount <span class="text-danger">*</span></label>
                                <select class="form-select" id="loan_amount" name="loan_amount">
                                    <option value="">Select Approximate Amount</option>
                                    <option value="Below ₹10 lakh">Below ₹10 lakh</option>
                                    <option value="₹10–25 lakh">₹10–25 lakh</option>
                                    <option value="₹25–50 lakh">₹25–50 lakh</option>
                                    <option value="₹50 lakh–₹1 crore">₹50 lakh–₹1 crore</option>
                                    <option value="₹1–5 crore">₹1–5 crore</option>
                                    <option value="Above ₹5 crore">Above ₹5 crore</option>
                                    <option value="Not sure">Not sure</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">City and State <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="city_state" name="city_state" placeholder="City and State">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Brief Requirement</label>
                                <textarea class="form-control" placeholder="Brief Requirement" id="requirement" name="requirement" maxlength="1000"></textarea>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="consent" name="consent" value="1">
                                    <label class="form-check-label form-label" for="consent">
                                        I agree that Shritik Global India Private Limited may use
                                        my information to review my enquiry and contact me about
                                        possible next steps. I have read and agree to the
                                        <a href="{{ route('privacy_policy') }}" target="_blank">
                                            Privacy Policy
                                        </a>.
                                        <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary rounded-pill py-3 px-5"
                                        type="submit">
                                    Submit Enquiry
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
@section('footer')
<style>
    .close {
        display: none;
    }
    .error {
        font-size: 13px;
        color: #f00;
    }
</style>
<script>
  (function() {
    $('#enquiry-form').validate({
        rules: {
            full_name: {
              required: true
            },
            mobile: {
              required: true,
              digits: true,
              minlength: 10,
              maxlength: 10
            },
            email: {
              alphanumeric: true,
              maxlength: 155,
            },
            applicant_type: {
              required: true
            },
            loan_category: {
              required: true
            },
            loan_product: {
              required: true
            },
            loan_amount: {
              required: true
            },
            city_state: {
              required: true
            },
            consent: {
              required: true
            }
        },
        messages:{
            full_name: {
              required: "Please enter full name."
            },
            mobile:{
                required: "Plese enter mobile number.",
            },
            email:{
              email: "Please provide a valid email."
            },
            applicant_type:{
              required: "Please select applicant type."
            },
            loan_category:{
              required: "Please select loan category."
            },
            loan_product:{
              required: "Please select loan product."
            },
            loan_amount:{
              required: "Please select loan amount."
            },
            city_state:{
                required: "Plese enter city & state.",
            },
            consent: {
              required: "Please accept the Privacy Policy and give your consent to proceed.",
            }
        },
        errorPlacement: function(error, element) {
            if (element.attr("name") === "consent") {
                error.insertAfter(element.closest(".form-check"));
            } else {
                error.insertAfter(element);
            }
        }
    });
  })();
</script>
@endsection