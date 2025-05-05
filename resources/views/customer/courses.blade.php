@extends('layouts.customer.app')
@section('content')
<!-- Hero Section -->
<section class="inner_banner">
    <img src="{{ asset('assets/images/inner-banner.svg') }}" class="w-100" alt="">
    <div class="inner_banner_caption">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2>Courses</h2>
                <p>Do you feel overwhelmed with life?    We’ve created a webinar just for you!</p>
            </div>
        </div>

    </div>
</section>
<!-- blog Section -->
<section id="courses" class="py-5">
    <div class="container ">

    <div class="course gy-4 align-items-center">
            <div class="course-img text-center">
                <img src="{{ asset('assets/images/Healthy_Cravings_Series.jpg') }}" alt="course-img" class="img-fluid">
            </div>
            <div class="course-content ">
                <p>
                Do you…


                    <br>
                    ~ struggle with food cravings?



                    <br>
                    ~ find yourself eating junk at the end of the day?



                    <br>
                    ~ feel like you’re addicted to sugar, carbs, or fats?



                    <br>
                    ~ wonder if you are eating to counteract stress or difficult emotions?



                    <br>
                    ~ wish you were more interested in healthy foods?


                    <br>
                    ~ wish that eating healthier didn’t require so much darn will power?


                    <br>

                </p>
                <h3>If so, we’ve created a 2-part series you’ll love!

                </h3>
                <a href="{{ route('customer.courses-healthy-cravings') }}" class="btn btn-primary mt-2">Sign me up
                    <i class="fa-solid fa-arrow-right-long ms-2"></i>
                </a>
            </div>
        </div>


        <div class="course gy-4 align-items-center">
            <div class="course-img text-center">
                <img src="{{ asset('assets/images/Calm24withText-300x290.jpg') }}" alt="course-img" class="img-fluid">
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
                <img src="{{ asset('assets/images/CreatingLovingRelationshipsTextOnly.jpg') }}" alt="course-img" class="img-fluid">
            </div>
            <div class="course-content ">
                <p>
                Do you feel alone or isolated?


                    <br>
                    Do your relationships lack a nourishing warmth and sweetness?



                    <br>
                    Have your connections with others been more about frustration and pain, than camaraderie and joy?


                    <br>
                    Maybe you are just burned out on all the hard work you’ve put into trying to “make things work” with a significant other.



                   
                    <br>

                </p>
                <h3>But wait! Take our course first before you give up!

                </h3>
                <a href="{{ route('customer.courses-loving-relationships') }}" class="btn btn-primary mt-2">Sign me up
                    <i class="fa-solid fa-arrow-right-long ms-2"></i>
                </a>
            </div>
        </div>

    </div>
</section>
@endsection