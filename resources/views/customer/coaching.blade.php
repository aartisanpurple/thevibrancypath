@extends('layouts.customer.app')
@section('content')
<!-- Hero Section -->
<section class="inner_banner">
    <img src="{{ asset('assets/images/inner-banner.svg') }}" class="w-100" alt="">
    <div class="inner_banner_caption">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2>Coaching</h2>
            </div>
        </div>

    </div>
</section>
<!-- Vs package Section -->
<section class="chaya-coaching-section py-5">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-4 col-sm-12 ">
                <div class="chaya-coaching-img text-center">
                    <img src="{{ asset('assets/images/About-soul.png ') }}" alt="chaya-coaching-img " class="img-fluid">
                </div>
            </div>
            <div class="col-lg-8 col-sm-12 ">
                <h2>Vibrancy Signature Discovery Package</h2>
                <p>All sessions can be done in person or by phone or Zoom. Call <span>434.361.2042</span> for information and to
                    schedule.</p>
                <h4>$295, includes:</h4>
                <p>
                    1. Vibrancy Signature Evaluation with Jamie Champion <br>
                    2. Customized eBook download<br>
                    3. 2 hr Vibrancy Signature Discovery Coaching Session with Chaya Champion

                    “I’m passionate about helping you discover your Soul’s  Purpose! Two hours will give us time to
                    explore in depth the details and wonders of your Vibrancy Signature. We’ll  talk about how your
                    Powers fit into your life and come up with practical strategies for stepping into your
                    magnificent
                    gifts and talents and honouring your unique needs.”
                </p>
            </div>
        </div>
    </div>
</section>
<section class="chaya-coaching-details py-5">
    <div class="container">
        <div class="row ">
            <div class="col-lg-7 col-sm-12 ">
                <div class="benefit-1">
                    <h4>Vibrancy Signature Transformative Nine Sessions</h4>
                    <p>Are you ready to discover the rest of your Team? Once you know your Primary Powers, take a
                        deeper
                        dive into your Transformative Nine. These parts of you give further details on what you need
                        in
                        career, relationships, and personal time for deep joy and fulfilment.<br>
                        1-1/2 hr session covering 3 Powers: <span>$225.</span><br>
                        Series of 3 sessions covering all 9 Powers: <span>$600</span>.</p>
                </div>
                <div class="benefit-2">
                    <h4>Vibrancy Signature Coaching</h4>
                    <p>If you are looking for a deeper connection to one of your Powers, let’s spend an hour
                        brainstorming together what that part of you needs and come up with a plan to bring those
                        gifts more alive. <span>$150.</span></p>
                </div>
                <div class="benefit-3">
                    <h4>Vibrancy Signature Personal Coaching Series</h4>
                    <p>Level 1: In this 7-week Series, we’ll explore in detail each of your Powers that make up your
                        Vibrancy Signature, and how they come together as a team to create your Soul’s Purpose.
                        We’ll explore where in your life you’re already living in alignment with your Vibrancy
                        Signature, and what you need to focus on so that you can take your relationships, career,
                        health, and overall happiness to the next level. <span>$995.</span></p>
                </div>
            </div>
            <div class="col-lg-5 col-sm-12">
                <div class="coaching-details-img text-center">
                    <img src="{{ asset('assets/images/About-soul.png') }}" alt="coaching-details-img" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
<!--Coacing with jamie-->
<section class="jamie-coaching py-5">
    <div class="container">
        <div class="row">
            <div class="heading text-center py-3">
                <h2>Vibrancy Wellness Coaching with Jamie Champion</h2>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="jamie-coachig-img text-center">
                    <img src="{{ asset('assets/images/About-soul.png') }}" alt="jamie-coachig-img" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <h4>You can create the health and vitality that’s your birthright.</h4>
                <p>Every physical pain or illness, every mental and emotional stress that you can’t seem to let go
                    of, and every pattern that you feel stuck in, has an energy imbalance at the core. And in some
                    way, they all relate back to your Vibrancy Signature and not living in alignment with your
                    Soul’s Purpose.
                    Regardless of your physical, mental, and emotional history and present circumstances, Vibrancy
                    Wellness Coaching can help you re-write the energetic “scripts” that are running any problematic
                    symptoms and patterns that plague you.
                    So if you’re ready to get to the bottom of your health challenges, are willing to be responsible
                    for your own healing journey, and are open to allowing the healing power within to regenerate
                    and revitalize you, then Vibrancy Wellness Coaching is for you.
                    1-hr Sessions, in person, by phone or Zoom $200. Call 434.361.2042 for information and to
                    schedule.
                    If you are a returning client, you may also schedule your appointment online </p>


            </div>
        </div>
    </div>
</section>
@endsection