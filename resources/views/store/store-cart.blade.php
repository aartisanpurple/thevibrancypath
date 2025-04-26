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
                
                  <th></th>
                </tr>
              </thead>
              <tbody id="cart-items">
                @php $subtotal = 0; @endphp
                @forelse ($cart as $item)
                @php
                $quantity = $item['quantity'] ?? 1;
                $itemTotal = $item['price'] * $quantity;
                $subtotal += $itemTotal;
                @endphp
                <tr id="cart-item-{{ $item['id'] }}">
                  <td class="d-flex align-items-center gap-3"><span>{{ $item['name'] }}</span></td>
                  <td>${{ number_format($item['price'], 2) }}</td>
                  <td>
                    <div class="input-group" style="max-width: 100px;">
                      <button class="btn btn-outline-secondary btn-sm update-quantity" data-action="decrease" data-id="{{ $item['id'] }}">-</button>
                      <input type="text" class="form-control text-center quantity" value="{{ $quantity }}" readonly>
                      <button class="btn btn-outline-secondary btn-sm update-quantity" data-action="increase" data-id="{{ $item['id'] }}">+</button>
                    </div>
                  </td>
                
                  <td>
                    <button class="btn btn-sm btn-link text-danger remove-item" data-id="{{ $item['id'] }}">✕</button>
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
              <a href="{{ route('customer.store') }}" class="btn btn-outline-primary">← Continue Shopping</a>
              <div class="d-flex gap-2 align-items-center">
                <form action="{{ route('customer.clear') }}" method="POST">
                  @csrf
                  <button class="btn btn-outline-danger" type="submit">
                    🗑️
                  </button>
                </form>
                <!-- 
                <div class="input-group" style="max-width: 300px;">
                  <input type="text" class="form-control" placeholder="Coupon Code">
                  <button class="btn btn-secondary">Apply</button>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Cart Total -->
      @php
      $shipping = 0.00; // Free shipping
      $discount = 0.00; // Apply coupon logic if needed
      $tax = 0.00; // Optional tax logic
      $total = $subtotal - $discount + $tax + $shipping;
      @endphp

      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <h5 class="mb-4">Cart Total</h5>
            <ul class="list-group list-group-flush mb-3">
              <li class="list-group-item d-flex justify-content-between">
                <span>Sub-total</span>
                <strong id="sub-total">${{ number_format($subtotal, 2) }}</strong>
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
              <li class="list-group-item d-flex justify-content-between">
                <strong>Total</strong>
                <strong id="total">${{ number_format($total, 2) }}</strong>
              </li>
            </ul>
            <a href="{{ route('customer.storecheckoutview') }}">
              <button class="btn btn-primary w-100">Proceed to Checkout →</button>
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Update Quantity
    $(document).on('click', '.update-quantity', function() {
      let action = $(this).data('action'); // Get the action (increase or decrease)
      let itemId = $(this).data('id'); // Get the item ID
      let input = $(this).siblings('.quantity'); // Get the input field with the current quantity
      let currentQty = parseInt(input.val()); // Get the current quantity
      let newQty = action === 'increase' ? currentQty + 1 : Math.max(1, currentQty - 1); // Calculate new quantity

      // Update input value (Visual change in UI)
      input.val(newQty);

      // Send the AJAX request to update the quantity
      $.ajax({
        url: "{{ route('customer.updatecart') }}", // Ensure the route is correct
        method: 'POST',
        data: {
          _token: '{{ csrf_token() }}', // CSRF token for security
          id: itemId, // Send the item ID
          quantity: newQty // Send the new quantity
        },
        success: function(res) {
          // Ensure the server returns the updated HTML and cart totals
          if (res.success) {
            // Update the cart HTML and totals
            $('#cart-items').html(res.cartHtml);
            $('#sub-total').text(res.subtotalFormatted);
            $('#total').text(res.totalFormatted);
          } else {
            // alert('Error updating cart');
          }
        },
        error: function() {
          // alert('Failed to update cart');
        }
      });
    });

    // Remove Item
    $(document).on('click', '.remove-item', function() {
      let itemId = $(this).data('id'); // Get the item ID to remove

      // Send the AJAX request to remove the item
      $.ajax({
        url: "{{ route('customer.removefromcart') }}", // Ensure the route is correct
        method: 'POST',
        data: {
          _token: '{{ csrf_token() }}', // CSRF token for security
          id: itemId // Send the item ID
        },
        success: function(res) {
          // Ensure the server returns the updated HTML and cart totals
          if (res.success) {
            // Remove the item row from the cart visually
            $('#cart-item-' + itemId).remove();
            $('#sub-total').text(res.subtotalFormatted);
            $('#total').text(res.totalFormatted);
          } else {
            // alert('Error removing item from cart');
          }
        },
        error: function() {
          //alert('Failed to remove item from cart');
        }
      });
    });
  });
</script>