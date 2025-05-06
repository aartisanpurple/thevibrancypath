@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Orders</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>User Name</th>
                                <th>Total Amount($)</th>
                                <th>Order Status</th>
                                <th>Payment Status</th>
                                <th>Payment Method</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>$ {{ $order->total_amount }}</td>
                                <td>
                                    @if($order->order_status == 0) Pending
                                    @elseif($order->order_status == 1) Confirmed
                                    @elseif($order->order_status == 2) Shipped
                                    @elseif($order->order_status == 3) Delivered
                                    @elseif($order->order_status == 4) Cancelled
                                    @endif
                                </td>

                                <td>
                                    @if($order->payment_status == 0) Pending
                                    @elseif($order->payment_status == 1) Paid
                                    @elseif($order->payment_status == 2) Failed
                                    @endif
                                </td>
                                <td>
                                    @if($order->payment_method == 1)
                                    COD
                                    @elseif($order->payment_method == 2)
                                    Other
                                    @else
                                    Unknown
                                    @endif
                                </td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.orders.show', $order->id) }}"
                                            class="btn btn-info btn-sm"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="View">
                                            <i class="bx bx-show"></i>
                                        </a>


                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection