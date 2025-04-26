@extends('layouts.customer.app')

@section('content')
<section class="py-5" style="background-color: #faf7f3;">
  <div class="container">
    <div class="row">
      <!-- Sidebar -->
     
      @include('dashboard.partials.menu')
<!-- Purchase Content -->
<div class="col-lg-9">
  <div class="card p-4 shadow-sm border-0">

    <h4 class="mb-3">My Purchase Products</h4>

    <div class="d-flex justify-content-between align-items-center mb-3">
      <div>
        <!-- <strong>From:</strong> 02/02/2025 &nbsp;
        <strong>To:</strong> 01/04/2025 -->
      </div>
      <div class="input-group" style="width: 250px;">
        <input type="text" class="form-control" placeholder="Search here.." />
        <span class="input-group-text"><i class="bi bi-search"></i></span>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Date</th>
            <th>Product</th>
            <th>Category</th>
            <th>Price</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @forelse($orders as $index => $order)
            @foreach($order->order_items as $item)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                <td class="text-start">
                  <img src="{{ $item->product->image }}" class="me-2" style="height: 50px;" alt="{{ $item->product->name }}" />
                  {{ $item->product->name }}
                </td>
                <td>{{ $item->product->category->name ?? 'N/A' }}</td> <!-- Display category name -->
                <td>${{ number_format($item->price, 2) }}</td>
                <td>
                  {{ ucfirst($order->order_status) }} <br>
                 
                </td>
              </tr>
            @endforeach
          @empty
            <tr>
              <td colspan="6" class="text-center">No orders found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>
</div>



    </div>
  </div>
</section>

@endsection