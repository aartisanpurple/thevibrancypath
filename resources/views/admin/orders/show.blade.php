@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Order Details</h4>
                <div class="page-title-right">
                    <div class="btn-group">
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
                            <i class="bx bx-arrow-back align-middle me-2"></i> Back to Orders
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Summary -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <!-- User Info -->
                    <div class="mb-4">
                        <h5>User Information</h5>
                        <p><strong>Name:</strong> {{ $order->user->name }}</p>
                        <p><strong>Email:</strong> {{ $order->user->email }}</p>
                        <h5>Shipping Address </h5>
                        @if ($order->order_address && $order->order_address->address)
                        {{ $order->order_address->address->address }},
                        {{ $order->order_address->address->city }},
                        {{ $order->order_address->address->state }},
                        {{ $order->order_address->address->country }},
                        {{ $order->order_address->address->postal_code }}
                        @else
                        <em>No address available</em>
                        @endif
                    </div>

                    <!-- Order Info -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="border p-3 rounded">
                                <strong>Order ID:</strong>
                                <p class="mb-0">{{ $order->id }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 rounded">
                                <strong>Status:</strong>
                                <span class="badge 
        {{ $order->order_status == 0 ? 'bg-warning' : 
           ($order->order_status == 1 ? 'bg-success' : 'bg-danger') }}">
                                    {{ $order->order_status == 0 ? 'Pending' : 
           ($order->order_status == 1 ? 'Completed' : 'Cancelled') }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 rounded">
                                <strong>Total:</strong>
                                <p class="mb-0">${{ number_format($order->total_amount, 2) }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Info -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="border p-3 rounded">
                                <strong>Payment Method:</strong>
                                <p class="mb-0">
                                    {{ $order->payment_method == 1 ? 'Cash on Delivery' : 'Other' }}
                                </p>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 rounded">
                                <strong>Payment Status:</strong>
                                @php
                                $paymentStatus = match($order->payment_status) {
                                0 => ['label' => 'Pending', 'badge' => 'warning'],
                                1 => ['label' => 'Paid', 'badge' => 'success'],
                                2 => ['label' => 'Failed', 'badge' => 'danger'],
                                default => ['label' => 'Unknown', 'badge' => 'secondary'],
                                };
                                @endphp

                                <span class="badge bg-{{ $paymentStatus['badge'] }}">
                                    {{ $paymentStatus['label'] }}
                                </span>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 rounded">
                                <strong>Payment ID:</strong>
                                <p class="mb-0">{{ $order->payment_id ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Order Items -->
                    <div class="mb-4">
                        <h5>Order Items</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Product</th>
                                        <th>Image</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->order_items as $item)
                                    <tr>
                                        <td>{{ $item->product->name ?? 'Product Deleted' }}</td>
                                        <td>
                                            @if(isset($item->product->image))
                                            <img src="{{ asset($item->product->image) }}" alt="Product Image" width="60">
                                            @else
                                            <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>${{ number_format($item->price, 2) }}</td>
                                        <td>${{ number_format($item->total_price, 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Optional: Add Shipping Info Here -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection