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
<section class="py-5" style="background-color: #faf7f3;">
  <div class="container">
    <div class="row g-4">

      <!-- Shopping Cart Table -->
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header bg-white border-bottom">
            <h5 class="mb-0">Shopping Cart</h5>
          </div>
          <div class="card-body">
          <table class="table align-middle">
  <thead class="table-light">
    <tr>
      <th>Products</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Total</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @forelse ($cart as $item)
      <tr>
        <td class="d-flex align-items-center gap-3">
      
          <span>{{ $item['name'] }}</span>
        </td>
        <td>${{ number_format($item['price'], 2) }}</td>
        <td>
          <div class="input-group" style="max-width: 100px;">
            <button class="btn btn-outline-secondary btn-sm" disabled>-</button>
            <input type="text" class="form-control text-center" value="1" readonly>
            <button class="btn btn-outline-secondary btn-sm" disabled>+</button>
          </div>
        </td>
        <td>${{ number_format($item['price'], 2) }}</td>
        <td>
      
            <button class="btn btn-sm btn-link text-danger" type="submit">✕</button>
      
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="5" class="text-center text-muted">Your cart is empty.</td>
      </tr>
    @endforelse
  </tbody>
</table>

            <!-- Bottom Buttons -->
            <div class="d-flex justify-content-between align-items-center pt-3 border-top mt-4">
              <a href="#" class="btn btn-outline-primary">
                ← Continue Shopping
              </a>
              <div class="input-group" style="max-width: 300px;">
                <input type="text" class="form-control" placeholder="Coupon Code">
                <button class="btn btn-secondary">Apply</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Cart Total -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <h5 class="mb-4">Cart Total</h5>
            <ul class="list-group list-group-flush mb-3">
              <li class="list-group-item d-flex justify-content-between">
                <span>Sub-total</span>
                <strong>$13.95</strong>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Shipping</span>
                <span class="text-success">Free</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Discount</span>
                <span>$0</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Tax</span>
                <span>$0.00</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <strong>Total</strong>
                <strong>$13.95</strong>
              </li>
            </ul>  <a href="{{ route('customer.storecheckout') }}" >
            <button class="btn btn-primary w-100"  >
           
            Proceed to Checkout →

            </button></a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection

