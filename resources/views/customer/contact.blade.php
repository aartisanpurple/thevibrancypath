@extends('layouts.customer.app')

@section('content')

 <!-- Hero Section -->
 <section class="inner_banner">
        <img src="{{ asset('assets/images/inner-banner.svg') }}" class="w-100" alt="">
        <div class="inner_banner_caption">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2>Coaching</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis officia nobis rerum
                        repudiandae minus? Itaque voluptate iure nemo consequatur velit.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-form-section py-5">
        <div class="container">
            <div class="row justify-content-center gap-3">
                <div class="contact col-lg-6 col-md-12">
                    <h2 class="text-center mb-5">Reach out to us</h2>
                    @if (session('success'))
                    <div class="alert alert-successCtm">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form class="row g-3 needs-validation"  id="contactForm"  method="POST" action="{{ route('customer.contact.store') }}" enctype="multipart/form-data" data-parsley-validate>
                        @csrf
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label"> Name</label>
                            <input type="text" class="form-control" id="validationCustom01"  name="name" value="" autofocus required parsley-required="true" parsley-trigger="change" placeholder="Enter your Name">
                            <div class="valid-feedback">
                                Enter your Name
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" name="email" value="" autofocus required parsley-required="true" parsley-trigger="change" placeholder="Enter your Email">
                            <div class="valid-feedback">
                                Enter your email id
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Contact</label>
                            <input type="number" class="form-control" id="validationCustom03" name="contact" required parsley-required="true" parsley-trigger="change" placeholder="Enter your Contact Number">
                            <div class="invalid-feedback">
                                Please enter contact number
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom05" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="validationCustom05" name="subject" autofocus required parsley-required="true" parsley-trigger="change" placeholder="Enter your Subject">
                            <div class="invalid-feedback">
                                Please enter subject
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationTextarea" class="form-label">Message</label>
                            <textarea class="form-control" id="validationTextarea" name="message" autofocus required parsley-required="true" parsley-trigger="change" placeholder="Write your message here.."></textarea>
                            <div class="invalid-feedback">
                                Please enter a message in the textarea.
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <button class="btn btn-filled" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 contact-info">
                    <h2 class="text-center mb-5">Contact</h2>
                    <ul class="list-unstyled">
                        <li><i class="ri-phone-line"></i> +434-361-2042</li>
                        <li><i class="ri-mail-line"></i> info@thevibrancypath.com<br>
                            support@thevibrancypath.com
                        </li>
                        <li><i class="ri-map-pin-line"></i> The Vibrancy Path 250
                            Lakeland Lane, Faber, VA 22938</li>
                    </ul>
                    <div class="socials text-center">
                        <ul class="list-unstyled ">
                            <i class="ri-instagram-fill"></i>
                            <i class="ri-facebook-fill"></i>
                            <i class="ri-linkedin-fill"></i>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection