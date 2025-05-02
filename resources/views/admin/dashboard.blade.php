@extends('layouts.admin')

@section('content')
<div class="container mt-5">
        <h1 class="mb-4">Dashboard </h1>

        <div class="row">
            <!-- Product Count Card -->
            <div class="col-md-6">
                <div class="card text-white  mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Products  {{ $productCount }}</h5>
                        
                    </div>
                </div>
            </div>

            <!-- Order Count Card -->
            <div class="col-md-6">
                <div class="card text-white  mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders  {{ $orderCount }}</h5>
                        
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection



