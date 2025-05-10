@extends('layouts.customer.app')
<style>
/* Hero Image */
.inner_banner img {
    width: 100%;
}

/* Blog Card Styles */
.blog {
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    margin-bottom: 2rem;
}

@media (min-width: 768px) {
    .blog {
        flex-direction: row;
        align-items: flex-start;
    }
}

.blog-img {
    flex: 0 0 300px;
    max-width: 300px;
    text-align: center;
    height: 50%; /* Adjust the height of the image container */
}

.blog-img img {
    border-radius: 8px;
    width: 100%;
  
    object-fit: cover; /* Ensures image maintains aspect ratio while cropping */
    height: 170px;  /* Fixed height for the image */
}

.blog-detail {
    flex: 1;
}

.blog-heading {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    margin-bottom: 0.5rem;
}

@media (min-width: 768px) {
    .blog-heading {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }
}

.blog-info {
    color: #6c757d;
    font-size: 0.875rem;
}
</style>
@section('content')
<!-- Hero Section -->
<section class="inner_banner">
    <img src="{{ asset('assets/images/inner-banner.svg') }}" alt="Banner Image">
    <div class="inner_banner_caption">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h2>Blogs</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis officia nobis rerum
                    repudiandae minus? Itaque voluptate iure nemo consequatur velit.</p>
            </div>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section id="blogs" class="py-5">
    <div class="container">

        @foreach ($blogs as $blog)
        <div class="blog">
            <!-- Blog Image -->
            <div class="blog-img">
                <img src="{{ asset('assets/images/blog-img.png') }}" alt="blog-img" class="img-fluid">
            </div>

            <!-- Blog Details -->
            <div class="blog-detail">
                <div class="blog-heading">
                    <h3>{{ $blog->title }}</h3>
                    <div class="blog-info">
                        <p class="mb-0">
                            Posted by: <span>{{ $blog->author }}</span> |
                            On: <span>{{ $blog->published_at->format('d-m-Y') }}</span>
                        </p>
                    </div>
                </div>
                <p>{!! Str::limit(strip_tags($blog->content), 200) !!}</p>
                <a href="{{ route('customer.blogDetails', $blog->id) }}" class="btn btn-sm btn-outline-primary mt-2">Read More ></a>
            </div>
        </div>
        @endforeach

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item {{ $blogs->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $blogs->previousPageUrl() }}">Previous</a>
                </li>
                @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                    <li class="page-item {{ $blogs->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $blogs->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ !$blogs->hasMorePages() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $blogs->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</section>
@endsection
