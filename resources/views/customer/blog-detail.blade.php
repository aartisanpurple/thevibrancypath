    @extends('layouts.customer.app')

@section('content')

    <!-- Hero Section -->
    <section class="inner_banner">
        <img src="{{ asset('assets/images/inner-banner.svg') }}" class="w-100" alt="">
        <div class="inner_banner_caption">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2>Blogs</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis officia nobis rerum
                        repudiandae minus? Itaque voluptate iure nemo consequatur velit.</p>
                </div>
            </div>

        </div>
    </section>


    <!-- blog detail Section -->
    <section id="blog-details" class="py-5">
        <div class="container">
            <div class="row gy-4 justify-content-center">
                <div class="blog-heading">
                    <h2>{{ $blog->title }}</h2>
                    <div class="blog-info">
                        <p>Posted by: <span>{{ $blog->author }}</span> Posted on <span>{{ $blog->published_at->format('d-m-Y') }}</span></p>
                    </div>
                </div>
                <div class="blog-detail-img text-center">
                    <img src="{{ asset('assets/images/blog-detail.png') }}" alt="blog-img" class="img-fluid">
                </div>
                <p>
                    {!! $blog->content !!}
                </p>
            </div>
        </div>
    </section>
@endsection


