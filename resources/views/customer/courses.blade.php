@extends('layouts.customer.app')
<style> /* Hero Image Full Width */
.inner_banner img {
    width: 100%;
}

/* Course Box Styling */
.course {
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 10px;
    background-color: #fff;
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

@media (min-width: 768px) {
    .course {
        flex-direction: row;
        align-items: flex-start;
    }
}

.course-img {
    flex: 0 0 300px;
    max-width: 300px;
    text-align: center;
}

.course-fixed-img {
    height: 100px;
    width: 100%;
    object-fit: cover;
    border-radius: 8px;
}

.course-content {
    flex: 1;
}

.course h3 {
    margin-top: 1rem;
}
</style>
@section('content')
<!-- Hero Section -->
<section class="inner_banner">
    <img src="{{ asset('assets/images/inner-banner.svg') }}" class="w-100" alt="">
    <div class="inner_banner_caption">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h2>Courses</h2>
                <p>Do you feel overwhelmed with life? We’ve created a webinar just for you!</p>
            </div>
        </div>
    </div>
</section>

<!-- Courses Section -->
<section id="courses" class="py-5">
    <div class="container">

        <!-- Course Item -->
        <div class="course d-flex flex-column flex-md-row align-items-start gap-4 mb-5">
            <div class="course-img text-center">
                <img src="{{ asset('assets/images/Healthy_Cravings_Series.jpg') }}" alt="Healthy Cravings" class="img-fluid course-fixed-img">
            </div>
            <div class="course-content">
                <p>
                    Do you…
                    <br>~ struggle with food cravings?
                    <br>~ find yourself eating junk at the end of the day?
                    <br>~ feel like you’re addicted to sugar, carbs, or fats?
                    <br>~ wonder if you are eating to counteract stress or difficult emotions?
                    <br>~ wish you were more interested in healthy foods?
                    <br>~ wish that eating healthier didn’t require so much darn will power?
                </p>
                <h3>If so, we’ve created a 2-part series you’ll love!</h3>
                <a href="{{ route('customer.courses-healthy-cravings') }}" class="btn btn-primary mt-2">Learn more
                    <i class="fa-solid fa-arrow-right-long ms-2"></i>
                </a>
            </div>
        </div>

        <!-- Course Item -->
        <div class="course d-flex flex-column flex-md-row align-items-start gap-4 mb-5">
            <div class="course-img text-center">
                <img src="{{ asset('assets/images/Calm24withText-300x290.png') }}" alt="Calm 24" class="img-fluid course-fixed-img">
            </div>
            <div class="course-content">
                <p>
                    Do you feel overwhelmed with life?
                    <br>Do you feel a general anxiousness about the state of the world or the political tension?
                    <br>Does it feel like your world is spinning, and you can’t seem to slow yourself down?
                    <br>Are you feeling uneasy, or even unsafe?
                    <br>Maybe you’ve even experienced the misery or even terror that is a panic attack.
                </p>
                <h3>We’ve created a webinar just for you!</h3>
                <a href="{{ route('customer.courses-calming-your-anxiety') }}" class="btn btn-primary mt-2">Learn more
                    <i class="fa-solid fa-arrow-right-long ms-2"></i>
                </a>
            </div>
        </div>

        <!-- Course Item -->
        <div class="course d-flex flex-column flex-md-row align-items-start gap-4 mb-5">
            <div class="course-img text-center">
                <img src="{{ asset('assets/images/CreatingLovingRelationshipsTextOnly.png') }}" alt="Loving Relationships" class="img-fluid course-fixed-img">
            </div>
            <div class="course-content">
                <p>
                    Do you feel alone or isolated?
                    <br>Do your relationships lack a nourishing warmth and sweetness?
                    <br>Have your connections with others been more about frustration and pain, than camaraderie and joy?
                    <br>Maybe you are just burned out on all the hard work you’ve put into trying to “make things work” with a significant other.
                </p>
                <h3>But wait! Take our course first before you give up!</h3>
                <a href="{{ route('customer.courses-loving-relationships') }}" class="btn btn-primary mt-2">Learn more
                    <i class="fa-solid fa-arrow-right-long ms-2"></i>
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
