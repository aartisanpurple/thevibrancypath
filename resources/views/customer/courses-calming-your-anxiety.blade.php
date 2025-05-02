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
    <!-- blog Section -->
    <section id="courses" class="py-5">
        <div class="container ">

            <div class="course gy-4 align-items-center">
                <div class="course-img text-center">
                    <img src="{{ asset('assets/images/About-soul.png ') }}" alt="course-img" class="img-fluid">
                </div>
                <div class="course-content ">
                    <p>
                    Do you…
                    <br>
                    struggle with food cravings?
                    <br>
                        find yourself eating junk at the end of the day?<br>
                        feel like you’re addicted to sugar, carbs, or fats?
                        <br>
                        wonder if you are eating to counteract stress or difficult emotions?
                        <br>
                        wish you were more interested in healthy foods?
                        <br>
                        wish that eating healthier didn’t require so much darn will power?

<br>
                    </p>
                    <h3>If so, we’ve created a 2-part series you’ll love!
                    </h3>
                    <a href="{{ route('customer.storeDetails', ['id' => 1]) }}" class="btn btn-primary mt-2">Sign me up
                        <i class="fa-solid fa-arrow-right-long ms-2"></i>
                    </a>
                </div>
            </div>

         
            
        </div>
    </section>
@endsection