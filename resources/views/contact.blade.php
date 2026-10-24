@extends('layouts.site-app')
@section('content')
	<!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Contact</h1>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Contact Us</h6>
                <h1 class="display-6 mb-4">If You Have Any Query, Please Feel Free Contact Us</h1>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.5s">
                    <form id="contact-form" name="contact-form" action="{{route('save.contact')}}" method="POST">
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
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                                    <label for="first_name">First Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                                    <label for="last_name">Last Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone">
                                    <label for="phone">Your Phone</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 200px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
    <!-- Google Map Start -->
    <div class="container-xxl pt-5 px-0 wow fadeIn" data-wow-delay="0.1s">
        <iframe class="w-100 mb-n2" style="height: 450px;"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d348.4732135964905!2d72.88090084399862!3d21.14254570443444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be0511f8e861521%3A0x144f4e575a6e8bf2!2sShritik%20Global%20India%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1792578796417!5m2!1sen!2sin"
            frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- Google Map End -->
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
    $('#contact-form').validate({
      rules: {
        first_name: {
          required: true
        },
        last_name: {
          required: true
        },
        phone: {
          required: true,
          digits: true,
          minlength: 10,
          maxlength: 10
        },
        email: {
          required: true,
          alphanumeric: true,
          maxlength: 155,
        },
        subject: {
          required: true
        },
        message: {
          required: true
        }
      },
      messages:{
        first_name: {
          required: "Please enter your first name."
        },
        last_name: {
          required: "Please enter your last name."
        },
        phone:{
            required: "Plese enter mobile number.",
        },
        email:{
          required: "Please enter your email.",
          email: "Please provide a valid email."
        },
        subject:{
          required: "Please enter your subject."
        },
        message:{
          required: "Please enter your message."
        }
      },
      errorPlacement: function(error, element) {
        error.insertAfter(element.parent());
      }
    });
  })();
</script>
@endsection