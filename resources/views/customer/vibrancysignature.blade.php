@extends('layouts.customer.app')
<style>
        .bg-light-pink {
    background-color: #faebf0;
}

.text-pink {
    color: #c14c8a;
}

.btn-outline-pink {
    color: #c14c8a;
    border: 2px solid #c14c8a;
    transition: all 0.3s ease;
}

.btn-outline-pink:hover {
    background-color: #c14c8a;
    color: white;
    border-color: #c14c8a;
}

.italic {
    font-style: italic;
}

</style>
@section('content')
<section id="home" class="hero-section position-relative w-100 vh-100 overflow-hidden">
    <video autoplay muted loop playsinline
        class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover"
        style="object-position: top center;">
        <source src="{{ asset('assets/video/welcome.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    
</section>
    <!-- Vs Section -->
    <section id="vs" class="py-5">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-lg-5 col-sm-12 ">
                    <div class="vibrancy-sign-img text-center">
                        <img src="{{ asset('assets/images/Screenshot 2025-04-30 080531.png') }}" alt="vibrancy-sign" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-7 col-sm-12 ">
                <h2>The Power of Knowing Your Vibrancy Signature</h2>
                    <p>Imagine having an owner’s manual to your life—one that reveals who you are, why you’re here, and
                        how to live authentically. Your Vibrancy Signature gives you a powerful way to truly understand
                        yourself and make choices that align with your nature. It reveals the unique energetic pattern
                        vibrating inside of you, holding the clearest answers to your deepest questions about purpose,
                        relationships, career, and self-care. Knowing and applying your Vibrancy Signature every day
                        brings balance, connection, health and lasting fulfillment into your life.
                    </p>
                    <a href="#vibrancy-sign" class="btn btn-primary">Learn more
                        <i class="fa-solid fa-arrow-right-long ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--video section-->
    <section class="video-section py-lg-5 py-lg-0 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-lg-10 inner-video-section">
                    <div class="video_res embed-responsive embed-responsive-16by9">
                        <video id="discover" class="embed-responsive-item video-frame" >
                            <source src="{{ asset('assets/images/Jamie-video.crdownload') }}" type="video/mp4">
                        </video>
                        <div class="video_overlay">
                            <div class="play_btn">
                                <i id="icon" class="ri-play-fill"></i>
                            </div>
                            <h3>Discover the Blueprint to Your Soul</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Discover-vs Section -->
    <section id="discover-vs">
        <div class="container">
            <div class="row gy-4 align-items-center">
                
                <div class="col-lg-7 col-md-12">
                    <h2>Discover Your Vibrancy Signature!</h2>
                    <p>Uncovering your Vibrancy Signature doesn’t take years of searching or endless therapy sessions.
                        Our breakthrough method measures the specific vibrational frequencies of your body—the energetic
                        patterns that hold the key to your soul’s blueprint. These frequencies reveal your unique
                        Powers: your natural gifts and talents waiting to shine, as well as what you specifically need
                        to stay healthy and vibrant.
                    </p>
                </div>
                <div class="col-lg-5 col-md-12">
    <div class="discover-vs-img text-center">
        <img src="{{ asset('assets/images/discover-vs.png') }}" alt="vibrancy-sign" 
             class="img-fluid" 
             style="border-radius: 50%; width: 450px; height: 450px; object-fit: cover;">
    </div>
</div>

            </div>
        </div>
    </section>
    <section class="vs-steps" class="py-5">
        <img src="{{ asset('assets/images/top-shape.svg') }}" class="curev_shape top_shape w-100"/>
        <div class="container">
        <div class="text-start mb-4">
        <h2 class="fw-bold display-5">Get Your Vibrancy Signature in 3 Simple Steps</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ol class="vibrancy-steps list-unstyled">
                    <li class="mb-4">
                        <h5 class="text-pink italic mb-1">1. Schedule Your Vibrancy Signature Evaluation</h5>
                        <p>This can be done in person or remotely. We will walk you through the evaluation process and what to expect in your two follow-up sessions.</p>
                    </li>
                    <li class="mb-4">
                        <h5 class="text-pink italic mb-1">2. Receive Your Personalized Vibrancy Signature Ebook</h5>
                        <p>Your results are delivered in a beautifully crafted Ebook that explains your unique Powers and what they reveal about your purpose, strengths, and needs. This guide also includes practical advice on how to apply these insights to your daily life for greater balance, alignment, and fulfillment.</p>
                    </li>
                    <li>
                        <h5 class="text-pink italic mb-1">3. Expand Your Journey by Joining the Vibrancy Community</h5>
                        <p>Become a part of our monthly membership program for ongoing support, connection, and inspiration as you live in alignment with your Vibrancy Signature. Your first month is free!</p>
                    </li>
                </ol>
                <div class="text-start mt-4">
                <a href="#vibrancy-sign" class="btn btn-primary">Learn more
                        <i class="fa-solid fa-arrow-right-long ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        </div>
        <img src="{{ asset('assets/images/bottom-shape.svg') }}" class="curev_shape bottom_shape w-100"/>
    </section>


    <!-- vs-isforyou -->
    <section id="vs-isForYou">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <h2>Is the Vibrancy Signature is For You?</h2>
                    <p>Let's be real—life can get overwhelming sometimes. Maybe you've felt this way
                    </p>
                </div>
                <div class="col-lg-12">
                    <div class="row my-4 gy-4">
                        <div class="col-lg-4 col-md-6">
                            <div class="vs-card">
                                <h4>Feeling Lost or Unfulfilled</h4>
                                <p>You’re doing all the right things, but something still feels off. You’re craving a
                                    deeper connection to your life, something that makes you feel truly alive.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="vs-card">
                                <h4>Struggles in Relationships</h4>
                                <p>You want real, meaningful connections, but it feels like people just don’t get you.
                                    Your relationships leave you longing for more.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="vs-card">
                                <h4>Career Misalignment</h4>
                                <p>Your job feels like a grind, draining your energy instead of fueling it. You’re not
                                    sure what would light you up, but you know this isn’t it.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="vs-card">
                                <h4>Health Problems</h4>
                                <p>Physical, mental or emotional challenges are draining energy and vitality from your
                                    life. No one seems to have the answers you need.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="vs-card">
                                <h4>Emotional Ups and Downs</h4>
                                <p>The highs and lows of life seem to hit you harder than they should. It’s tough to
                                    stay balanced and grounded.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="vs-card">
                                <h4>Self-Care Confusion</h4>
                                <p>You know self-care is important, but what actually works for you? You’re not sure how
                                    to truly nourish yourself.</p>
                            </div>
                        </div>
                    </div>
                    <div class="para text-center mt-4">
                        <h4>If any of this sounds familiar, you’re definitely not alone. These challenges often come from
                            being out of sync with your true self. The good news? There’s a way to find clarity,
                            balance,
                            and inspiration.</h4>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="cta-section py-5">
        <div class="container">
            <disv class="row inner-content text-center">
                <div class="col-lg-8">
                    <h2>Your Most Authentic Life Awaits</h2>
                    <p>Imagine a life where you feel deeply connected to your purpose, where your relationships and
                        career align with your true self, and where you wake up every day feeling inspired and alive.
                        This is the power of your Vibrancy Signature. Are you ready to unlock it?</p>
                    <a href="#" class="btn btn-primary"> Get started now<i class="fa-solid fa-arrow-right-long ms-2"> </i></a>
                </div>
            </disv>
        </div>
    </section>
 
@endsection