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

      <!-- Billing Info -->
      <div class="col-lg-8">
        <div class="card p-4">
          <h5 class="mb-4">Billing Information</h5>
          <form>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">First name *</label>
                <input type="text" class="form-control" placeholder="First name">
              </div>
              <div class="col-md-6">
                <label class="form-label">Last name</label>
                <input type="text" class="form-control" placeholder="Last name">
              </div>
              <div class="col-md-6">
                <label class="form-label">Phone *</label>
                <input type="tel" class="form-control" value="+91 9874562165">
              </div>
              <div class="col-md-6">
                <label class="form-label">Email *</label>
                <input type="email" class="form-control" placeholder="example@gmail.com">
              </div>
              <div class="col-md-6">
                <label class="form-label">Address 1 *</label>
                <input type="text" class="form-control" placeholder="Enter address">
              </div>
              <div class="col-md-6">
                <label class="form-label">Address 2</label>
                <input type="text" class="form-control" placeholder="Enter address">
              </div>
              <div class="col-md-4">
                <label class="form-label">Country *</label>
                <select class="form-select">
                  <option>Select...</option>
                  <option>India</option>
                  <option>USA</option>
                  <option>UK</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label">State *</label>
                <select class="form-select">
                  <option>Select...</option>
                  <option>Delhi</option>
                  <option>Maharashtra</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label">City *</label>
                <select class="form-select">
                  <option>Select...</option>
                  <option>Mumbai</option>
                  <option>Delhi</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label">ZIP/Postal Code *</label>
                <input type="text" class="form-control">
              </div>
              <div class="col-md-12">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="rememberInfo">
                  <label class="form-check-label" for="rememberInfo">Remember my information</label>
                </div>
              </div>
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
            <li class="list-group-item d-flex justify-content-between border-top pt-3">
              <strong>Total</strong>
              <strong>$13.95</strong>
            </li>
          </ul>
          <div class="mb-3">
            <label class="form-label">Coupon Code</label>
            <input type="password" class="form-control" placeholder="*****">
          </div>
          <button class="btn btn-primary w-100">Place Order →</button>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection

