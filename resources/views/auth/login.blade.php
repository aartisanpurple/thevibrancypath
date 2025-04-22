@extends('layouts.customer.app')

@section('content')
   <!-- Login Form -->
   <section class="login-section py-5">
        <div class="container text-center">
            <h2 class="mb-4">Welcome</h2>
            @if (session('success'))
                    <div class="alert alert-successCtm mx-auto" style="max-width: 400px;">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger mx-auto" style="max-width: 400px;">
                            {{ session('error') }}
                </div>
            @endif
            <form class="mx-auto" style="max-width: 400px;" method="POST" id="loginForm" action="{{ route('login') }}" enctype="multipart/form-data" data-parsley-validate>
                @csrf
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" autofocus required parsley-type="email" parsley-required="true" parsley-trigger="change">
                </div>
                <div class="mb-3 text-start">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required parsley-type="password" parsley-required="true" parsley-trigger="change">
                </div>
                <div class="mb-3 form-check text-start">
                    <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe" parsley-type="checkbox" parsley-required="true" parsley-trigger="change">
                    <label class="form-check-label text-muted" for="rememberMe">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary w-100 rounded-pill">Login</button>
                <p class="mt-3">Don’t have an account? <a href="{{ route('register') }}">Sign Up</a></p>
            </form>
        </div>
    </section>
@endsection
