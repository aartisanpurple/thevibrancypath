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
</section>
<!-- Product Section -->
<section class="product-section py-5 mt-5" style="background-color: #f7f3ef;">
    <div class="container">
        <h3 class="text-left mt-3 mb-4">Welcome to The Vibrancy Path.</h3>
        <form method="GET" action="{{ route('customer.storesearch') }}">
            <div class="row g-4">
                <!-- Sidebar Filters -->
                <div class="col-lg-3 col-md-12 mb-4">
                    <div class="bg-white p-4 rounded shadow-sm sidebar">
                        <h5 class="mb-4">Filter by Category</h5>

                        <div class="mb-4">
                            @foreach ($categories as $cat)
                            <div class="mb-3">
                                <p class="text-muted mb-2 cat_title">{{ $cat->name }}</p>

                                @foreach ($cat->subcategories as $sub)
                                <div class="form-check mb-2">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="subcategory_id"
                                        value="{{ $sub->id }}"
                                        id="sub{{ $sub->id }}"
                                        {{ request('subcategory_id') == $sub->id ? 'checked' : '' }}>
                                    <label class="form-check-label" for="sub{{ $sub->id }}">
                                        {{ $sub->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary mt-3">Apply Filters</button>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="col-lg-9 col-md-12">
                    <div class="bg-white p-4 rounded shadow-sm sidebar">
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
                            <div>
                                <p class="mb-0 result"><strong>{{ $products->total() }}</strong> Results found.</p>
                            </div>

                            <!-- Search bar -->
                            <div class="flex-grow-1 mx-3" style="max-width: 400px;">
                                <div class="input-group">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Search for anything..."
                                        name="keyword"
                                        value="{{ request('keyword') }}">
                                    <button class="btn btn-outline-secondary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Sort Dropdown (optional logic to be added later) -->
                            <div class="d-flex align-items-center" style="min-width: 200px;">
                                <!-- <label for="sortSelect" class="me-2 mb-0">Sort by:</label>
                            <select class="form-select" id="sortSelect" style="width: auto;" disabled>
                                <option selected>Most Popular</option>
                                <option>Price: Low to High</option>
                                <option>Price: High to Low</option>
                            </select> -->
                            </div>
                        </div>


                        <!-- Products Grid -->
                        <div class="row g-4">
                            @foreach ($products as $product)
                            <div class="col-md-4">
                                <div class="bg-white p-3  text-center h-100 d-flex flex-column justify-content-between product_card">
                                    <div>
                                        <a href="#" class="text-decoration-none text-dark">
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
                                        <p class="price-txt mb-0">${{ number_format($product->price, 2) }}</p>



                                        <button class="btn btn-primary px-4 add-to-cart"
                                            data-id="{{ $product->id }}"
                                            data-name="{{ $product->name }}"
                                            data-price="{{ $product->price }}"
                                            data-img="{{ $product->image }}">
                                            Add to cart
                                        </button>

                                        <!-- Toast Message (Initially Hidden) -->
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

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $products->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        // Quantity increase/decrease
        $('.quantity-increase').click(function() {
            let qty = parseInt($('#productQuantity').val()) || 1;
            $('#productQuantity').val(qty + 1);
        });

        $('.quantity-decrease').click(function() {
            let qty = parseInt($('#productQuantity').val()) || 1;
            if (qty > 1) {
                $('#productQuantity').val(qty - 1);
            }
        });

        // AJAX Add to Cart
        $('.add-to-cart').click(function(e) {
            e.preventDefault();

            const button = $(this);
            const id = button.data('id');
            const name = button.data('name');
            const price = button.data('price');
            const image = button.data('img');
            const quantity = parseInt($('#productQuantity').val()) || 1;

            $.ajax({
                url: "{{ route('customer.store.api') }}", // Updated to use the store-api route
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
                        // Show toast with message
                        $('#cart-toast .toast-body').text('Product added to cart!');
                        $('#cart-toast').fadeIn().delay(2000).fadeOut();
                        // alert("Added to cart!");
                    }
                },
                error: function() {
                    // alert("Something went wrong. Try again.");
                }
            });
        });

    });
</script>