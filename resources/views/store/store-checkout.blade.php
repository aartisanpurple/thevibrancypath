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
        </div>
      </div>
    </div>
  </div>
  <h4 class="text-center mt-3">Welcome to The Vibrancy Path.</h4>
</section>
@php
$cart = json_decode(request()->cookie('cart', '[]'), true);

$subtotal = 0;
foreach ($cart as $item) {
  $subtotal += $item['price'] * $item['quantity'];
}
$coupon = json_decode(Cookie::get('coupon', '{}'), true);
$discount = isset($coupon['discount']) ? $coupon['discount'] : 0;
$tax = 0; // Add tax calculation here (e.g., $subtotal * 0.18)
$total = $subtotal - $discount + $tax;
@endphp

<section class="py-5" style="background-color: #faf7f3;">
  <div class="container">
    <div class="row g-4">

      <!-- Billing Info -->
      <div class="col-lg-8">
        <div class="card p-4">
          <h5 class="mb-4">Billing Information</h5>

          @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

          <form action="{{ route('customer.storecheckout') }}" method="POST">
            @csrf

            @guest
            <div class="mb-3">
              <p class="mt-3">Already have an account? <a href="{{ route('login') }}">Log in here</a></p>
            </div>
            @endguest

            @auth
            <!-- <div class="mb-3">
              <p> Welcome back, <strong>{{ Auth::user()->name ?? 'User' }}</strong>!</p>
            </div> -->

            @if ($addresses = Auth::user()->addresses ?? null)
            <div class="mb-3">
              <!-- <label class="form-label d-block">Choose a saved address:</label> -->
              @foreach ($addresses as $address)
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="selected_address_id" id="address_{{ $address->id }}" value="{{ $address->id }}">
                <label class="form-check-label" for="address_{{ $address->id }}">
                  {{ $address->address }}, {{ $address->city }}, {{ $address->state }} - {{ $address->postal_code }}
                </label>
              </div>
              @endforeach

              <div class="form-check">
                <input class="form-check-input" type="radio" name="selected_address_id" id="new_address" value="new">
                <label class="form-check-label" for="new_address">
                   Add New Address
                </label>
              </div>
            </div>
            @endif
            @endauth

            <!-- New Address Fields -->
            <div id="new-address-fields" style="display: none;">
              <p class="fw-bold">Enter New Address:</p>
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">First name *</label>
                  <input type="text" name="first_name" class="form-control" placeholder="First name">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Last name</label>
                  <input type="text" name="last_name" class="form-control" placeholder="Last name">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Phone *</label>
                  <input type="tel" name="phone" class="form-control">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Email *</label>
                  <input type="email" name="email" class="form-control" placeholder="example@gmail.com">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Address 1 *</label>
                  <input type="text" name="address1" class="form-control" placeholder="Enter address">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Address 2</label>
                  <input type="text" name="address2" class="form-control" placeholder="Enter address">
                </div>
                <div class="col-md-4">
                  <label class="form-label">Country *</label>
                  <select class="form-select" name="country">
                    <option value="">Select...</option>
                    <option value="India">India</option>
                    <option value="USA">USA</option>
                    <option value="UK">UK</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label">State *</label>
                  <select class="form-select" name="state">
                    <option value="">Select...</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Maharashtra">Maharashtra</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label">City *</label>
                  <select class="form-select" name="city">
                    <option value="">Select...</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Delhi">Delhi</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label">ZIP/Postal Code *</label>
                  <input type="text" name="zip_code" class="form-control">
                </div>
              </div>
            </div>

            @guest
            <!-- Show full form to guests -->
            <div class="row g-3 mt-3">
              <div class="col-md-6">
                <label class="form-label">First name *</label>
                <input type="text" name="first_name" class="form-control" placeholder="First name" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Last name</label>
                <input type="text" name="last_name" class="form-control" placeholder="Last name">
              </div>
              <div class="col-md-6">
                <label class="form-label">Phone *</label>
                <input type="tel" name="phone" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email *</label>
                <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Address 1 *</label>
                <input type="text" name="address1" class="form-control" placeholder="Enter address" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Address 2</label>
                <input type="text" name="address2" class="form-control" placeholder="Enter address">
              </div>
              <div class="col-md-4">
                <label class="form-label">Country *</label>
                <select class="form-select" name="country" required>
                  <option value="">Select...</option>
                  <option value="India">India</option>
                  <option value="USA">USA</option>
                  <option value="UK">UK</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label">State *</label>
                <select class="form-select" name="state" required>
                  <option value="">Select...</option>
                  <option value="Delhi">Delhi</option>
                  <option value="Maharashtra">Maharashtra</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label">City *</label>
                <select class="form-select" name="city" required>
                  <option value="">Select...</option>
                  <option value="Mumbai">Mumbai</option>
                  <option value="Delhi">Delhi</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label">ZIP/Postal Code *</label>
                <input type="text" name="zip_code" class="form-control" required>
              </div>
            </div>
            @endguest

            <!-- Cart Summary as Hidden Fields -->
            <input type="hidden" name="subtotal" value="{{ $subtotal }}">
            <input type="hidden" name="discount" value="{{ $discount }}">
            <input type="hidden" name="tax" value="{{ $tax }}">
            <input type="hidden" name="total" value="{{ $total }}">

            <div class="mt-4">
              <button type="submit" class="btn btn-primary w-100">Place Order →</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Cart Summary -->
      <div class="col-lg-4">
        <div class="card p-4">
          <h5 class="mb-3">Cart Total</h5>
          <ul class="list-group list-group-flush mb-3">
            <li class="list-group-item d-flex justify-content-between">
              <span>Sub-total</span>
              <strong>${{ number_format($subtotal, 2) }}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Shipping</span>
              <span class="text-success">Free</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Discount</span>
              <span>${{ number_format($discount, 2) }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Tax</span>
              <span>${{ number_format($tax, 2) }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between border-top pt-3">
              <strong>Total</strong>
              <strong>${{ number_format($total, 2) }}</strong>
            </li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const radios = document.querySelectorAll('input[name="selected_address_id"]');
    const newAddressFields = document.getElementById('new-address-fields');

    radios.forEach(radio => {
      radio.addEventListener('change', function () {
        if (this.value === 'new') {
          newAddressFields.style.display = 'block';
        } else {
          newAddressFields.style.display = 'none';
        }
      });

      // Show if pre-selected
      if (radio.checked && radio.value === 'new') {
        newAddressFields.style.display = 'block';
      }
    });
  });
</script>

