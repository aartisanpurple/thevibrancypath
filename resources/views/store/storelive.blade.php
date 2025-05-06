@extends('layouts.customer.app')
<link rel="stylesheet" href="{{ asset('assets/css/pages/store.css') }}">

@section('content')
<!-- Hero Section -->
<section class="inner_banner">
    <img src="{{ asset('assets/images/inner-banner.svg') }}" class="w-100" alt="">
    <div class="inner_banner_caption d-flex align-items-center" style="min-height: 300px;">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-10">
                    <h2>Store</h2>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
    <div class="container d-flex justify-content-center mt-3">
        <div class="alert alert-success text-center w-50">
            {{ session('success') }}
        </div>
    </div>
    @endif
    <!-- Toast Message -->
    <div id="cart-toast" class="position-fixed top-0 end-0 p-3" style="z-index: 1055; display: none;">
        <div class="toast align-items-center text-bg-success border-0 show" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    Product added to cart!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" onclick="$('#cart-toast').fadeOut();"></button>
            </div>
        </div>
    </div>
</section>

<section class="product-section py-5 mt-5" style="background-color: #f7f3ef;">
    <div class="container">
        <h3 class="text-left mt-3 mb-4">Welcome to The Vibrancy Path.</h3>
        <form method="GET" action="{{ route('customer.storesearchlive') }}" id="filterForm">
            <div class="row g-4">
                <!-- Sidebar Filters -->
                <div class="col-lg-3 col-md-12 mb-4">
                    <div class="bg-white p-4 rounded shadow-sm sidebar">
                        <h5 class="mb-4">Filter by Category</h5>
                        <div class="mb-4">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="subcategory_id" value="" id="allProducts"
                                    {{ request('subcategory_id') == null ? 'checked' : '' }} onclick="submitFilter()">
                                <label class="form-check-label" for="allProducts">All Products</label>
                            </div>
                            @foreach ($categories as $cat)
                            <div class="mb-3">
                                <p class="text-muted mb-2 cat_title">{{ $cat->name }}</p>
                                @foreach ($cat->subcategories as $sub)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="subcategory_id"
                                        value="{{ $sub->id }}" id="sub{{ $sub->id }}"
                                        {{ request('subcategory_id') == $sub->id ? 'checked' : '' }}
                                        onclick="submitFilter()">
                                    <label class="form-check-label" for="sub{{ $sub->id }}">{{ $sub->name }}</label>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="col-lg-9 col-md-12">
                    <div class="bg-white p-4 rounded shadow-sm sidebar">
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
                            <div>
                                <p class="mb-0 result"><strong>{{ $products->total() }}</strong> Results found.</p>
                            </div>
                            <div class="flex-grow-1 mx-3" style="max-width: 400px;">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for anything..."
                                        name="keyword" value="{{ request('keyword') }}">
                                    <button class="btn btn-outline-secondary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <select class="form-select" id="sortSelect" name="sort" style="width: auto;">
                                <option value="popular" {{ request('sort') == 'popular' || !request('sort') ? 'selected' : '' }}>Most Popular</option>
                                <option value="low_to_high" {{ request('sort') == 'low_to_high' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="high_to_low" {{ request('sort') == 'high_to_low' ? 'selected' : '' }}>Price: High to Low</option>
                            </select>
                        </div>

                        <div class="row g-4">
                            <div id="productResults">
                                @include('store.partials.product-list')
                            </div>
                        </div>
                    </div>

                    <!-- Pagination (optional AJAX upgrade later) -->
                    <div class="mt-4">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div class="flex-fill text-start">
                                @if ($products->onFirstPage())
                                <span class="btn btn-outline-secondary disabled">← Previous</span>
                                @else
                                <a href="{{ $products->previousPageUrl() }}" class="btn btn-outline-secondary">← Previous</a>
                                @endif
                            </div>
                            <div class="flex-fill text-center">
                                {{ $products->onEachSide(1)->links('pagination::bootstrap-5') }}
                            </div>
                            <div class="flex-fill text-end">
                                @if ($products->hasMorePages())
                                <a href="{{ $products->nextPageUrl() }}" class="btn btn-outline-secondary">Next →</a>
                                @else
                                <span class="btn btn-outline-secondary disabled">Next →</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function submitFilter() {
        let form = $('#filterForm');
        let action = form.attr('action');
        let data = form.serialize();

        $.ajax({
            url: action,
            type: 'GET',
            data: data,
            beforeSend: function() {
                $('#productResults').html('<div class="text-center py-5">Loading...</div>');
            },
            success: function(data) {
                $('#productResults').html(data);
            },
            error: function() {
                $('#productResults').html('<div class="text-danger text-center py-5">Something went wrong. Please try again.</div>');
            }
        });
    }

    // Bind events for filters, search, sort
    $(document).ready(function() {
        $('input[name="keyword"]').on('keyup', function() {
            submitFilter();
        });

        $('#sortSelect').on('change', function() {
            submitFilter();
        });
    });

    // Use event delegation for dynamic .add-to-cart buttons
    $(document).on('click', '.add-to-cart', function(e) {
        e.preventDefault();

        const button = $(this);
        const id = button.data('id');
        const name = button.data('name');
        const price = button.data('price');
        const image = button.data('img');
        const quantity = parseInt($('#productQuantity').val()) || 1;

        $.ajax({
            url: "{{ route('customer.store.api') }}",
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                product_id: id,
                product_name: name,
                product_price: price,
                product_img: image,
                quantity: quantity
            },
            success: function(response) {
                if (response.success) {
                    $('.cart-count').text(response.count);
                    $('#cart-toast .toast-body').text('Product added to cart!');
                    $('#cart-toast').fadeIn().delay(2000).fadeOut();
                }
            },
            error: function() {
                alert("Something went wrong. Try again.");
            }
        });
    });
</script>