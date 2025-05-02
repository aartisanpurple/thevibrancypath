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
        <form class="mx-auto" style="max-width: 400px;" method="POST" id="registerForm" action="{{ route('membership-form') }}" enctype="multipart/form-data" data-parsley-validate>
            @csrf
            <input type="hidden" name="type" value="{{ $data['type'] }}">
            <input type="hidden" name="price" value="{{ $data['price'] }}">
            <input type="hidden" name="validity_days" value="{{ $data['validity_days'] }}">

            <!-- Name -->
            <div class="mb-3 text-start">
                <label for="name" class="form-label">Name</label>
                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" parsley-required="true" parsley-trigger="change">
                @error('name')
                <span class="text-sm text-red-600 mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" parsley-required="true" parsley-trigger="change">
                @error('email')
                <span class="text-sm text-red-600 mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- Mobile No -->
            <div class="mb-3 text-start">
                <label for="mobile_no" class="form-label">Mobile No</label>
                <input id="mobile_no" class="form-control" type="number" name="mobile_no" value="{{ old('mobile_no') }}" required autocomplete="mobile_no" parsley-required="true" parsley-trigger="change">
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="btn btn-primary w-100 rounded-pill">
                    Check Out
                </button>
            </div>
        </form>
    </div>
    <section>
        @endsection