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
<!-- Product Section -->
<section class="product-section py-5 mt-5" style="background-color: #f7f3ef;">
    <div class="container">
        <div class="row g-4">
            <!-- Sidebar Filters -->
            <div class="col-lg-3 col-md-12 mb-4">
    <div class="bg-white p-4 rounded shadow-sm">
        <h5 class="mb-4">All Products</h5>

        <div class="mb-4">
            @foreach ($category as $cat) 
                <h4 class="text-muted mb-2"><b>{{ $cat->name }}</b></h4>

                {{-- Subcategory Loop --}}
                @foreach ($cat->subcategories as $sub)
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="essences" id="essence{{ $sub->id }}">
                        <label class="form-check-label" for="essence{{ $sub->id }}">{{ $sub->name }}</label>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>


            <!-- Product Grid -->
            <div class="col-lg-9 col-md-12">
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
                    <div>
                        <h6 class="mb-0"><strong>{{ count($products) }}</strong> Results found.</h6>
                    </div>
                    <div class="flex-grow-1 mx-3" style="max-width: 400px;">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for anything...">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Sort Dropdown -->
                    <div style="min-width: 200px;">
                        <select class="form-select">
                            <option selected>Sort by: Most Popular</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                        </select>
                    </div>

                </div>

                <div class="row g-4">
    @foreach ($products as $product)
        <div class="col-md-4">
            <div class="bg-white p-3 rounded shadow-sm text-center h-100 d-flex flex-column justify-content-between">
                <div>
                    <a href="" class="text-decoration-none text-dark">
                        <div class="mb-3 d-flex align-items-center justify-content-center" style="height: 200px; overflow: hidden;">
                            <img src="{{ url('/' . $product->image) }}" class="img-fluid h-100" style="object-fit: cover;" alt="{{ $product->name }}">
                        </div>
                        <h6>{{ $product->name }}</h6>
                    </a>    
                    <p class="text-muted small mb-2 text-truncate" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                        {{ $product->description }}
                    </p>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <p class="fw-bold mb-0">${{ number_format($product->price, 2) }}</p>

                    <!-- Add to Cart form -->
                    <form action="{{ route('customer.savecart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="product_img" value="{{ $product->image }}">
                        <input type="hidden" name="product_name" value="{{ $product->name }}">
                        <input type="hidden" name="product_price" value="{{ $product->price }}">
                        <button type="submit" class="btn btn-primary btn-sm">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>


            </div>

        </div>
    </div>
</section>
@endsection

