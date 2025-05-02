@extends('layouts.customer.app')
@section('content')
<!-- Hero Section -->
<section class="inner_banner">
    <img src="{{ asset('assets/images/inner-banner.svg') }}" class="w-100" alt="">
    <div class="inner_banner_caption">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2>Membership</h2>
            </div>
        </div>

    </div>
</section>
<section class="py-5" style="background-color: #faf7f3;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
             

                    <h2 class="mb-3">Vibrancy Signature Membership Package</h2>
                    <p class="text-muted mb-4">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                    </p>

                  

                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('membership-form') }}" class="btn btn-primary px-4" style="background-color: #8b0078; border-color: #8b0078;">
                            Join Membership
                        </a>
                        <a href="#learn-more" class="btn btn-outline-secondary px-4">
                            Learn More
                        </a>
                    </div>

            
            </div>
        </div>
    </div>
</section>
<section class="py-5" style="background-color: #faf7f3;">
    <div class="container">
        <div class="row justify-content-center g-4">
            <!-- Left Card -->
            <div class="col-lg-5">
                <div class="card h-100 border-0 shadow-sm p-4" style="background-color: #fbeef7; border-radius: 25px;">
                    <h2 class="mb-3" style="font-size: 2.5rem;">$100</h2>
                    <h5 class="mb-4" style="font-weight: bold;">$100, includes:</h5>
                    <ul class="text-muted text-start list-unstyled">
                        <li>1) Vibrancy Signature Evaluation with Jamie Champion</li>
                        <li>2) Customized eBook download</li>
                        <li>3) 2 hr Vibrancy Signature Discovery Coaching Session with Chaya Champion</li>
                        <li>4) Unlimited access to all premium content</li>
                        <li>5) Access to the private members-only community</li>
                        <li>6) Monthly live Q&A + replay library</li>
                    </ul>
                    <div class="mt-4 text-center">
                        <a href="{{ route('membership-form') }}" class="btn btn-primary px-4" 
                           style="background-color: #8b0078; border-color: #8b0078; border-radius: 30px;">
                            Join Membership
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Card -->
            <div class="col-lg-5">
                <div class="card h-100 border-0 shadow-sm p-4 text-white" style="background-color: #9b2282; border-radius: 25px;">
                    <h2 class="mb-3" style="font-size: 2.5rem;">$295</h2>
                    <h5 class="mb-4"> $295, includes:</h5>
                    <ul class="text-start list-unstyled">
                        <li>1) Vibrancy Signature Evaluation with Jamie Champion</li>
                        <li>2) Customized eBook download</li>
                        <li>3) 2 hr Vibrancy Signature Discovery Coaching Session with Chaya Champion</li>
                        <li>4) Unlimited access to all premium content</li>
                        <li>5) Access to the private members-only community</li>
                        <li>6) Monthly live Q&A + replay library</li>
                        <li>7) Unlimited access to all premium content</li>
                        <li>8) Access to the private members-only community</li>
                        <li>9) Monthly live Q&A + replay library</li>
                        <li>10) Unlimited access to all premium content</li>
                    </ul>
                    <div class="mt-4 text-center">
                        <a href="{{ route('membership-form') }}" class="btn btn-light px-4" 
                           style="color: #8b0078; border-radius: 30px;">
                            Join Membership
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection