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
                    Do you feel overwhelmed with life?

                    <br>
                    Do you feel a general anxiousness about the state of the world or the political tension?

                    <br>
                    Does it feel like your world is spinning, and you can’t seem to slow yourself down?

                    <br>
                    Are you feeling uneasy, or even unsafe?

                    <br>
                    Maybe you’ve even experienced the misery or even terror that is a panic attack.

                    <br>
                    If so, we want you to know that we have great compassion for how you’re feeling, that you’re not alone, and that there is hope and possibility ahead!

                    <br>

                </p>
                <h3>We’ve created a webinar just for you!
                </h3>
                <a href="{{ route('customer.courses-calming-your-anxiety') }}" class="btn btn-primary mt-2">Sign me up
                    <i class="fa-solid fa-arrow-right-long ms-2"></i>
                </a>
            </div>
        </div>


        <div class="course gy-4 align-items-center">
            <div class="course-img text-center">
                <img src="{{ asset('assets/images/About-soul.png ') }}" alt="course-img" class="img-fluid">
            </div>
            <div class="course-content ">
                <p>
                    Do you feel overwhelmed with life?

                    <br>
                    Do you feel a general anxiousness about the state of the world or the political tension?

                    <br>
                    Does it feel like your world is spinning, and you can’t seem to slow yourself down?

                    <br>
                    Are you feeling uneasy, or even unsafe?

                    <br>
                    Maybe you’ve even experienced the misery or even terror that is a panic attack.

                    <br>
                    If so, we want you to know that we have great compassion for how you’re feeling, that you’re not alone, and that there is hope and possibility ahead!

                    <br>

                </p>
                <h3>We’ve created a webinar just for you!
                </h3>
                <a href="{{ route('customer.courses-calming-your-anxiety') }}" class="btn btn-primary mt-2">Sign me up
                    <i class="fa-solid fa-arrow-right-long ms-2"></i>
                </a>
            </div>
        </div>

        
        <div class="course gy-4 align-items-center">
            <div class="course-img text-center">
                <img src="{{ asset('assets/images/About-soul.png ') }}" alt="course-img" class="img-fluid">
            </div>
            <div class="course-content ">
                <p>
                    Do you feel overwhelmed with life?

                    <br>
                    Do you feel a general anxiousness about the state of the world or the political tension?

                    <br>
                    Does it feel like your world is spinning, and you can’t seem to slow yourself down?

                    <br>
                    Are you feeling uneasy, or even unsafe?

                    <br>
                    Maybe you’ve even experienced the misery or even terror that is a panic attack.

                    <br>
                    If so, we want you to know that we have great compassion for how you’re feeling, that you’re not alone, and that there is hope and possibility ahead!

                    <br>

                </p>
                <h3>We’ve created a webinar just for you!
                </h3>
                <a href="{{ route('customer.courses-calming-your-anxiety') }}" class="btn btn-primary mt-2">Sign me up
                    <i class="fa-solid fa-arrow-right-long ms-2"></i>
                </a>
            </div>
        </div>

    </div>
</section>
@endsection