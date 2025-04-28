@extends('layouts.customer.app')
@section('content')
<!-- Hero Section -->
<section class="inner_banner">
    <img src="{{ asset('assets/images/inner-banner.svg') }}" class="w-100" alt="">
    <div class="inner_banner_caption">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2>Courses</h2>
            </div>
        </div>

    </div>
</section>
<section class="py-5" style="background-color: #faf7f3;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm p-4 d-flex flex-row align-items-center" style="background-color: #fbeef7; border-radius: 25px;">
                    
                    <!-- Left Image -->
                    <div class="me-4">
                        <img src="{{ asset('assets/images/About-soul.png ') }}" alt="Healthy Cravings Series" class="img-fluid" style="max-width: 250px; border-radius: 15px;">
                    </div>

                    <!-- Right Content -->
                    <div>
                        <p class="mb-3" style="color: #555; font-size: 1.1rem;">
                            Do you... <br>
                            struggle with food cravings? <br>
                            find yourself eating junk at the end of the day? <br>
                            feel like you’re addicted to sugar, carbs, or fats? <br>
                            wonder if you are eating to counteract stress or difficult emotions? <br>
                            wish you were more interested in healthy foods? <br>
                            wish that eating healthier didn’t require so much darn will power?
                        </p>
                        <h5 class="mb-4" style="font-weight: 500;">
                            If so, we’ve created a 2-part series you’ll love!
                        </h5>
                        <a href="/sign-up" class="btn btn-outline-primary px-4" style="border-color: #8b0078; color: #8b0078; border-radius: 30px;">
                            Sign Me Up → 
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection