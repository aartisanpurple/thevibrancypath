@extends('layouts.customer.app')

@section('content')
<!-- Hero Section -->
<section class="inner_banner">
    <img src="{{ asset('assets/images/inner-banner.svg') }}" class="w-100" alt="">
    <div class="inner_banner_caption d-flex align-items-center" style="min-height: 300px;">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-10">
                    <h2>Invoice</h2>
                </div>
            </div>
        </div>
    </div>
    <h4 class="text-center mt-3">Welcome to The Vibrancy Path.</h4>
</section>

<section class="py-5" style="background-color: #faf7f3;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card border-0 shadow-sm p-4">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold">Invoice</h1>
            <h3 class="text-end" style="font-family: cursive; color: #8b0078;">Vibrancy Path</h3>
          </div>

          <div class="row mb-4">
            <div class="col-md-6">
              <p><strong>Bill To:</strong> {{ $order->first_name ?? 'N/A' }}</p>
              <p><strong>Address:</strong> {{ $order->address1 }}, {{ $order->city }}</p>
              <p><strong>Phone:</strong> {{ $order->phone }}</p>
              <p><strong>Email:</strong> {{ $order->email }}</p>
            </div>
            <div class="col-md-6 text-md-end">
              <p><strong>Invoice No:</strong> INV-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</p>
            
          


            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
              <thead class="table-light">
                <tr>
                  <th>Sr. No</th>
                  <th>Product</th>
                  <th>Quantity</th>
                  <th>Rate</th>
                  <th>Tax</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                @php $subtotal = 0; @endphp
                @foreach ($orderItems as $index => $item)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $item->product->name ?? 'Product #' . $item->product_id }}</td>
                  <td>{{ $item->quantity }}</td>
                  <td>${{ number_format($item->price, 2) }}</td>
                  <td>$0.00</td>
                  <td>${{ number_format($item->total_price, 2) }}</td>
                </tr>
                @php $subtotal += $item->total_price; @endphp
                @endforeach
              </tbody>
              <tfoot class="table-light">
                <tr>
                  <td colspan="5" class="text-end fw-bold">Subtotal</td>
                  <td>${{ number_format($subtotal, 2) }}</td>
                </tr>
                <tr>
                  <td colspan="5" class="text-end fw-bold">Tax</td>
                  <td>$0.00</td>
                </tr>
                <tr>
                  <td colspan="5" class="text-end fw-bold">Total</td>
                  <td class="fw-bold">${{ number_format($order->total_amount, 2) }}</td>
                </tr>
              </tfoot>
            </table>
          </div>

          <div class="text-center mt-4">
            <p class="text-muted mb-2">Thank you for your purchase!</p>
            <div class="d-flex justify-content-center gap-3">
              <a href="/" class="btn btn-outline-secondary px-4">Go to Homepage</a>
              <a href="/store" class="btn btn-primary px-4" style="background-color: #8b0078; border-color: #8b0078;">Go to Store</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection
