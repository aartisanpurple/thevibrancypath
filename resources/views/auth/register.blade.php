@extends('layouts.customer.app')

@section('content')
<section class="login-section py-5">
    <div class="container text-center">
        <h2 class="mb-4">Register</h2>

        <form class="mx-auto" style="max-width: 400px;" method="POST" id="registerForm" action="{{ route('register') }}" enctype="multipart/form-data" data-parsley-validate>
            @csrf
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
            <!-- User Name -->
            <div class="mb-3 text-start">
                <label for="user_name" class="form-label">User Name</label>
                <input id="user_name" class="form-control" type="text" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" parsley-required="true" parsley-trigger="change">
            </div>
            <!-- Mobile No -->
            <div class="mb-3 text-start">
                <label for="mobile_no" class="form-label">Mobile No</label>
                <input id="mobile_no" class="form-control" type="number" name="mobile_no" value="{{ old('mobile_no') }}" required autocomplete="mobile_no" parsley-required="true" parsley-trigger="change">
            </div>
            <!-- Password -->
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" parsley-required="true" parsley-trigger="change">
                @error('password')
                <span class="text-sm text-red-600 mt-2">{{ $message }}</span>
                @enderror
            </div>






            <!-- Confirm Password -->
            <div class="mb-3 text-start">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" parsley-required="true" parsley-trigger="change">
                @error('password_confirmation')
                <span class="text-sm text-red-600 mt-2">{{ $message }}</span>
                @enderror
            </div>
            <!-- Affiliate Code -->
            <div class="mb-3 text-start">
                <label for="affiliate_code" class="form-label">Affiliate Code</label>
                <input id="affiliate_code" class="form-control" type="text" name="affiliate_code" value="{{ old('affiliate_code') }}" autocomplete="off" parsley-trigger="change">
                @error('affiliate_code')
                <span class="text-sm text-red-600 mt-2">{{ $message }}</span>
                @enderror
            </div>
            <!-- Buttons -->
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    Already registered?
                </a>

                <button type="submit" class="btn btn-primary w-100 rounded-pill">
                    Register
                </button>
            </div>
        </form>
    </div>
    <section>
        @endsection