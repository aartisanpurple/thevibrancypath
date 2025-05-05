@extends('layouts.customer.app')

@section('content')
<section class="login-section py-5">
    <div class="container text-center">
        <h4 class="mb-4">Membership information</h4>
        @if (session('success'))
        <div class="container d-flex justify-content-center mt-3">
            <div class="alert alert-success text-center w-50">
                {{ session('success') }}
            </div>
        </div>
        @endif
        <h2>Checkout</h2>
    <p><strong>Type:</strong> {{ $data['type'] }}</p>
    <p><strong>Price:</strong> ${{ $data['price'] }}</p>
    <p><strong>Validity:</strong> {{ $data['validity_days'] }} days</p>
    <form class="mx-auto" style="max-width: 400px;" method="POST" id="registerForm" action="{{ route('membershipsubmit') }}" enctype="multipart/form-data" data-parsley-validate>
    @csrf
    <input type="hidden" name="type" value="{{ $data['type'] }}">
    <input type="hidden" name="price" value="{{ $data['price'] }}">
    <input type="hidden" name="validity_days" value="{{ $data['validity_days'] }}">

    <!-- Name -->
    <div class="mb-3 text-start">
        <label for="name" class="form-label">Name</label>
        <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required>
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <!-- Email -->
    <div class="mb-3 text-start">
        <label for="email" class="form-label">Email</label>
        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <!-- Mobile No -->
    <div class="mb-3 text-start">
        <label for="mobile_no" class="form-label">Mobile No</label>
        <input id="mobile_no" class="form-control" type="text" name="mobile_no" value="{{ old('mobile_no') }}" required>
        @error('mobile_no') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-primary w-100 rounded-pill">Check Out</button>
</form>

    </div>
    <section>
        @endsection