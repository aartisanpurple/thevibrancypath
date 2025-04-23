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
</section>
<!-- Product Detail Section -->
<section class="py-5" style="background-color: #f7f3ef;">
  <div class="container">
    <div class="row g-4">
      <!-- Image Thumbnails -->
      <div class="col-md-2 d-flex justify-content-center">
        <div class="d-flex flex-column overflow-auto" style="max-height: 400px; gap: 6px;">
          <img src="{{ url('/' . $store->image) }}" class="img-fluid border rounded" alt="Thumb" style="height: 90px; object-fit: cover; cursor: pointer;">
          <img src="{{ url('/' . $store->image) }}" class="img-fluid border rounded" alt="Thumb" style="height: 90px; object-fit: cover; cursor: pointer;">
          <img src="{{ url('/' . $store->image) }}" class="img-fluid border rounded" alt="Thumb" style="height: 90px; object-fit: cover; cursor: pointer;">
        </div>
      </div>

      <!-- Main Product Image -->
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
          <div class="text-warning me-2">
            ★★★★★
          </div>
          <span class="small text-muted">4.7 Star Rating (21,671 User feedback)</span>
        </div>

        <p class="mb-1"><strong>Net Weight:</strong> 30ml</p>
        <p class="mb-1"><strong>Availability:</strong> <span class="text-success">In Stock</span></p>

        <h5 class="text-primary my-3">
          ${{ number_format($store->price, 2) }}
          <del class="text-muted fs-6">${{ number_format($store->price + 1.35, 2) }}</del>
        </h5>

        <p class="text-muted" style="line-height: 1.6;">
          {{ $store->description }}
        </p>

        <!-- Quantity and Add to Cart -->
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
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {

    // Quantity increase/decrease
    $('.quantity-increase').click(function () {
      let qty = parseInt($('#productQuantity').val()) || 1;
      $('#productQuantity').val(qty + 1);
    });

    $('.quantity-decrease').click(function () {
      let qty = parseInt($('#productQuantity').val()) || 1;
      if (qty > 1) {
        $('#productQuantity').val(qty - 1);
      }
    });

    // AJAX Add to Cart
    $('.add-to-cart').click(function (e) {
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
        success: function (response) {
          if (response.success) {
            $('.cart-count').text(response.count); // Optional: Live cart update
            alert("Added to cart!");
          }
        },
        error: function () {
          alert("Something went wrong. Try again.");
        }
      });
    });

  });
</script>