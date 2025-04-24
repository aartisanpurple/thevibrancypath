@extends('layouts.customer.app')

@section('content')
<!-- Hero Section -->
<section class="inner_banner">
    <img src="{{ asset('assets/images/inner-banner.svg') }}" class="w-100" alt="">
    <div class="inner_banner_caption d-flex align-items-center" style="min-height: 300px;">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-10">
                    <h2>Store</h2>
                    <p>Welcome to The Vibrancy Path. Use the category links on the sidebar to start shopping.</p>
                </div>
            </div>
        </div>
    </div>
    <h4 class="text-center mt-3">Welcome to The Vibrancy Path.</h4>
    @if (session('success'))
    <div class="container d-flex justify-content-center mt-3">
        <div class="alert alert-success text-center w-50">
            {{ session('success') }}
        </div>
    </div>
    @endif
</section>
<section class="py-5" style="background-color: #faf7f3;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card text-center border-0 shadow-sm p-4">
                    <div class="mb-4">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 100px; height: 100px; background-color: #d4f3d1;">
                            <i class="bi bi-check2" style="font-size: 3rem; color: green;"></i>
                        </div>
                    </div>
                    <h4 class="mb-3">Your Order Successfully placed</h4>
                    <p class="text-muted mb-4">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s.
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="/" class="btn btn-outline-secondary px-4">Go to homepage</a>
                        <a href="/store" class="btn btn-primary px-4" style="background-color: #8b0078; border-color: #8b0078;">Go to Store</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection