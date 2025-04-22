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


    <!-- blog Section -->
    <section id="blogs" class="py-5">
        <div class="container ">
           
            @foreach ($blogs as $blog)
            <div class="blog gy-4 align-items-center">
                <div class="blog-img text-center">
                    <img src="{{ asset('assets/images/blog-img.png') }}" alt="blog-img" class="img-fluid">
                </div>
                <div class="blog-detail ">
                    <div class="blog-heading d-flex ">
                        <h3>{{ $blog->title }}</h3>
                        <div class="blog-info">
                            <p>Posted by: <span>{{ $blog->author }}</span> Posted on <span>{{ $blog->published_at->format('d-m-Y') }}</span></p>
                        </div>
                    </div>
                    <p>
                        {!! $blog->content !!}
                    </p>
                    <a href="{{ route('customer.blogDetails', $blog->id) }}">Read More ></a>
                </div>
            </div>
            @endforeach
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item {{ $blogs->currentPage() == 1 ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $blogs->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              @for ($i = 1; $i <= $blogs->lastPage(); $i++)

              <li class="page-item {{ $blogs->currentPage() == $i ? 'active' : '' }}"><a class="page-link" href="#">1</a></li>
              @endfor
              <li class="page-item {{ $blogs->currentPage() == $blogs->lastPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $blogs->nextPageUrl() }}">Next</a>
              </li>
            </ul>
        </nav>

    </section>


@endsection
