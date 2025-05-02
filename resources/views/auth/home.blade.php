@extends('layouts.customer.app')

@section('content')
<!-- Hero Section -->
<!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="wave-shape"></div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="profile-image">
                        <img src="{{ asset('assets/images/about.png') }}" alt="Jamie" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-7 col-md-10">
                    <h2>About Vibrancy Path</h2>
                    <p>You’re one of a kind, and it’s time to radiate your own unique light into the world!

                        <br>
                        <br>
                        What brings you most alive, keeps you energetic and healthy, and makes your life really work for you? It’s written in your very own cells! Whether it’s finding clarity in your purpose, improving relationships, mastering your health or creating harmony within your family, the Vibrancy Path is here to guide you every step of the way toward living authentically, confidently, and vibrantly. It All Starts with the Vibrancy Signature.</p>
                    <a href="#about" class="btn btn-primary">Learn more about Vibrancy Signature
                        <i class="fa-solid fa-arrow-right-long ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Section -->
    <!-- <section class="video-section py-5 bg-light">
        <div class="container text-center">
            <h2>Discover the Blueprint to Your Soul</h2>
            <div class="video-container mt-4">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/your-video-id" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Testimonials Section -->
    <!-- <section id="testimonials" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Client Testimonials</h2>
            <div class="testimonial-carousel">
                <div class="row">
                    <div class="col-md-4">
                        <div class="testimonial-card">
                            <img src="images/user1.png" alt="Courtney Henry" class="rounded-circle">
                            <h5>Courtney Henry</h5>
                            <p>"I would just say it's amazing only three days and I'm able to settle using the
                                techniques that Jamie taught me."</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="testimonial-card">
                            <img src="images/user2.png" alt="Dianne Pine" class="rounded-circle">
                            <h5>Dianne Pine</h5>
                            <p>"Jamie's program has given me all the support I just needed to get through this difficult
                                time in my life."</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="testimonial-card">
                            <img src="images/user3.png" alt="Darlene Robertson" class="rounded-circle">
                            <h5>Darlene Robertson</h5>
                            <p>"Our relationship with Jamie more than met my expectations and brought me peace."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section id="testimonials" class="py-5">
        <h2 class="text-center mb-4">Client Testimonials</h2>
        <div class="container position-relative">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                @foreach($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            <img src="{{ asset('assets/images/user1.png') }}" alt="Courtney Henry" class="rounded-circle">
                            <h5>Courtney Henry</h5>
                            <p>"I would just say it's amazing only three days and I'm able to settle using the
                                techniques that Jamie taught me."</p>
                        </div>
                    </div>
                   
                    @endforeach
                </div>
                
               
            </div>
            <div class="d-flex swiper_nav justify-content-center gap-3">
                <div class="swiper-button-prev"><i class="ri-arrow-left-circle-fill"></i></div>
                <div class="swiper-button-next"><i class="ri-arrow-right-circle-fill"></i></div>
            </div>

        </div>
    </section>

    <!-- Meet Jamie Section -->
    <section class="meet-jamie py-lg-5 py-md-5 py-sm-5  pb-0">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-lg-7 col-md-12">
                    <h2>Meet Jamie:<br>Creator of Vibrancy Signature</h2>
                    <p>With years of experience in a wide range of healing modalities, energy analysis and personal
                        transformation, Jamie has guided countless individuals toward discovering and living in
                        alignment with their true selves through the Vibrancy Path. With his unique ability to interpret
                        energetic patterns and the role they play in a person’s self expression, health and relationship
                        to life, he translates them into actionable insights that help you uncover your gifts, align
                        with your purpose, and live the vibrant life you were born for.</p>
                    <a href="#contact" class="btn btn-primary">Learn More About Jamie <i
                            class="fa-solid fa-arrow-right-long ms-2"></i></a>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="jamie-images">
                        <img src="{{ asset('assets/images/jamie.png') }}" alt="Jamie" class="img-fluid ">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
