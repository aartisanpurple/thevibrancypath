@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row g-3">
       <!-- Total Products -->
<div class="col-md-3">
    <a href="{{ url('admin/products') }}" class="text-decoration-none">
        <div class="card text-white" style="background-color: #8b0078;">
            <div class="card-body">
                <h6 class="card-title text-white">Total Products</h6>
                <p class="card-text fs-3 text-white">{{ $productCount }}</p>
                <i class="fas fa-box fa-2x text-white"></i>
            </div>
        </div>
    </a>
</div>


       <!-- Total Category -->
<div class="col-md-3">
    <a href="{{ url('admin/category') }}" class="text-decoration-none">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h6 class="card-title text-white">Total Category</h6>
                <p class="card-text fs-3 text-white">{{ $categoryCount }}</p>
                <i class="fas fa-list fa-2x text-white"></i>
            </div>
        </div>
    </a>
</div>

       <!-- Total Orders -->
<div class="col-md-3">
    <a href="{{ url('admin/orders') }}" class="text-decoration-none">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h6 class="card-title text-white">Total Orders</h6>
                <p class="card-text fs-3 text-white">{{ $orderCount }}</p>
                <i class="fas fa-shopping-cart fa-2x text-white"></i>
            </div>
        </div>
    </a>
</div>


    <!-- Total Users -->
<div class="col-md-3">
    <a href="{{ url('admin/user') }}" class="text-decoration-none">
        <div class="card text-white" style="background-color: #8b0078;">
            <div class="card-body">
                <h6 class="card-title text-white">Total Users</h6>
                <p class="card-text fs-3 text-white">{{ $userCount }}</p>
                <i class="fas fa-users fa-2x text-white"></i>
            </div>
        </div>
    </a>
</div>

    </div>

@endsection
