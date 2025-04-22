@extends('layouts.customer.app')

@section('content')
<!-- Hero Section -->
<section class="inner_banner">
        <img src="{{ asset('assets/images/inner-banner.svg') }}" class="w-100" alt="">
        <div class="inner_banner_caption">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2>About Us</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis officia nobis rerum
                        repudiandae minus? Itaque voluptate iure nemo consequatur velit.</p>
                </div>
            </div>

        </div>
    </section>


    <!-- discover Section -->
    <section id="discover-sp" class="py-5">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-lg-4 col-sm-12 ">
                    <div class="discover-sp-img text-center">
                        <img src="{{ asset('assets/images/About-soul.png') }}" alt="discover-sp-img" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12 ">
                    <h2>Discover Your Soul’s Purpose</h2>
                    <p>The Vibrancy Path® is a one of a kind method to help you discover your soul’s purpose, connect to
                        your innate power, live with radiant health, and become the best you imaginable.
                        You’re in the right place if….You’re craving more meaning, depth, and inspiration in your life.
                        You’re running yourself ragged without direction or purpose, and at the end of the day you just
                        feel spent and empty.
                        You ache for more love and appreciation in your relationships, or you’ve lost that special
                        spark.
                        You feel stuck in relationship patterns that are deadening to your spirit.
                        You worry that you’re not being the best parent to your kids.
                        Your job isn’t joyful and juicy, or leaves you exhausted at the end of the day.
                        You have nagging health issues that drain your energy.
                    </p>
                </div>
            </div>
            <p>We’re so glad you’ve found us!  We’ve helped thousands of people just like you overcome these concerns.
                We know life is busy. There’s so much to do – you’re probably juggling more balls than anyone knows.</p>
        </div>
    </section>

    <!-- cta section-->
    <section class="border-box py-5">
        <div class="container">
            <disv class="row inner-content text-center">
                <div class="col-lg-10">
                    <h2>But a soul’s call cannot be denied.</h2>
                    <p>Your Higher Self knows your life has a purpose and a mission. Not living in alignment with that
                        purpose will only lead to heartache, frustration, and eventually physical illness. We see it
                        every day.
                        When you don’t know or aren’t living your Soul’s Purpose, it’s easy to spin your wheels, waste
                        your energy, and wonder what the heck you’re supposed to be doing.  And it’s practically
                        impossible to have deep, lasting happiness.</p>
                </div>
            </disv>
        </div>
    </section>

    <!-- one-person-section Section -->
    <section class="one-person-section py-5">
        <div class="container">
            <div class="row gy-4 align-items-center text-center">
                <div class="content mb-3">
                    <h2>There is only one person that can fulfill the role you’ve come to play.</h2>
                    <p>Your heart’s desires, your greatest contribution to the planet, the way in which you live and
                        love, are unique to you. But you don’t have to figure out how to create your greatest life all
                        by yourself.
                        In our own lives, and in our work with thousands of people, we have repeatedly seen that you
                        cannot be truly, deeply happy if you aren’t living in alignment with your soul’s purpose.</p>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <div class="one-person-img text-center">
                            <img src="{{ asset('assets/images/discover-vs.png') }}" alt="one-person-img" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <p class="text-start">Your heart’s desires, your greatest contribution to the planet, the way in
                            which you live and love, are unique to you. But you don’t have to figure out how to create
                            your greatest life all by yourself.
                            e’re Jamie and Chaya Champion, and we’ve developed The Vibrancy Path because it’s our
                            passion to help people live the life they were born to live, with an unshakable foundation
                            of happiness, inspiration, and peace.
                            We’ve both had experiences in our early lives of not living in alignment with our soul’s
                            purpose, and not knowing how to truly step into our gifts. Our ‘stumbling’ through life that
                            way led to painful divorces, serious illness, depression, and lots of confusion….really,
                            lots<br>
                            <br>
                            It was a combination of our pain, our individual educations, a lot of personal growth and
                            development, intuition, science, and grace that led to the development of The Vibrancy Path.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="potential-section py-5" >
        <img src="{{ asset('assets/images/top-shape.svg') }}" class="curev_shape top_shape w-100" />
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-lg-7 col-md-12">
                    <h2>Only you can fulfill your purpose and reach your potential.</h2>
                    <p class="text-start">Your life is NOW, and your soul is calling. Look at the caller I.D.  Do you really want to let this one go to voice mail?
                        It would be our honor to help you discover your Soul’s Purpose, because we know what an incredible impact it can make on your life. It’s our passion and vision to see you begin living into your magnificence.
                        We look forward to helping you create a vibrant life where you’re living in alignment with the gifts you were born to share with the world, believing in yourself, reveling in your vitality, and getting the most out of every day.
                    </p>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="discover-vs-img text-center">
                        <img src="{{ asset('assets/images/discover-vs.png') }}" alt="vibrancy-sign" class="img-fluid">
                    </div>
                </div>
            </div>
            
        </div>
    </section>

@endsection
