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
          <p>Product Details</p>
        </div>
      </div>
    </div>
  </div>
  <h4 class="text-center mt-3">Welcome to The Vibrancy Path.</h4>
</section>

<!-- Product Detail Section -->
<section class="py-5" style="background-color: #f7f3ef;">
  <div class="container">
    <div class="row g-4">
      <!-- Thumbnails -->
      <div class="col-md-2 d-flex justify-content-center">
        <div class="d-flex flex-column overflow-auto" style="max-height: 400px; gap: 6px;">
          @for($i = 0; $i < 3; $i++)
            <img src="{{ url('/' . $store->image) }}" class="img-fluid border rounded" alt="Thumb" style="height: 90px; object-fit: cover; cursor: pointer;">
            @endfor
        </div>
      </div>

      <!-- Main Image -->
      <div class="col-md-4 text-center d-flex align-items-center justify-content-center">
        <div>
          <img id="mainProductImage"
            src="{{ url('/' . $store->image) }}"
            class="img-fluid border rounded"
            alt="{{ $store->name }}"
            style="max-height: 400px; object-fit: contain;">
          <a href="{{ url('/' . $store->image) }}" target="_blank" class="d-block mt-2 text-decoration-underline small text-muted">
            View Full Size
          </a>
        </div>
      </div>

      <!-- Product Info -->
      <div class="col-md-6">
        <h4>{{ $store->name }}</h4>
        <div class="d-flex align-items-center mb-2">
          <!-- Dynamic Star Rating -->
          <div class="d-flex align-items-center mb-2">
            <div class="text-warning me-2">
              @php
              $fullStars = floor($averageRating);
              $halfStar = ($averageRating - $fullStars) >= 0.5;
              @endphp

              @for ($i = 1; $i <= 5; $i++)
                @if ($i <=$fullStars)
                ★
                @elseif ($i===$fullStars + 1 && $halfStar)
                <span style="position: relative; display: inline-block;">
                <span style="position: absolute; width: 50%; overflow: hidden;">★</span>☆
                </span>
                @else
                ☆
                @endif
                @endfor
            </div>

            <span class="small text-muted">
              @if ($reviewCount > 0)
              {{ $averageRating }} Star Rating ({{ $reviewCount }} User{{ $reviewCount > 1 ? 's' : '' }} feedback)
              @else
              No reviews yet
              @endif
            </span>
          </div>

        </div>


       

        <h5 class="text-primary my-3">
          ${{ number_format($store->price, 2) }}
          <del class="text-muted fs-6">${{ number_format($store->price + 1.35, 2) }}</del>
        </h5>

        <p class="text-muted" style="line-height: 1.6;">
          {{ $store->description }}
        </p>

        <!-- Quantity + Add to Cart -->
        <div class="d-flex align-items-center mt-4">
          <div class="input-group me-3" style="width: 100px;">
            <button class="btn btn-outline-secondary quantity-decrease" type="button">-</button>
            <input type="text" id="productQuantity" class="form-control text-center" value="1">
            <button class="btn btn-outline-secondary quantity-increase" type="button">+</button>
          </div>
          <button class="btn btn-primary px-4 add-to-cart"
            data-id="{{ $store->id }}"
            data-name="{{ $store->name }}"
            data-price="{{ $store->price }}"
            data-img="{{ $store->image }}">
            Add to cart
          </button>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Related Products Section -->
<section class="py-5" style="background-color: #f7f3ef;">
  <div class="container">
    <h4 class="mb-4 text-center">Frequently Bought Together</h4>
    <div class="row justify-content-center">
      @foreach($relatedProducts as $relatedProduct)
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="card h-100">
          <img src="{{ url('/' . $relatedProduct->image) }}" class="card-img-top" alt="{{ $relatedProduct->name }}" style="object-fit: cover; height: 200px;">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-center">{{ $relatedProduct->name }}</h5>
            <p class="card-text text-center">${{ number_format($relatedProduct->price, 2) }}</p>
            <a href="" class="btn btn-primary btn-sm mt-auto mx-auto d-block">View Product</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Quantity control
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

    // Add to Cart with toast
    $('.add-to-cart').click(function(e) {
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
  });
</script>