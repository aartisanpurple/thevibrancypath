@extends('layouts.customer.app')

@section('content')
<section class="py-5" style="background-color: #faf7f3;">
  <div class="container">
    <div class="row">
      <!-- Sidebar -->
      
      @include('dashboard.partials.menu')
      <!-- Account Edit Content -->
      <div class="col-lg-9">
        <div class="card p-4 shadow-sm border-0">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- <h4 class="mb-0">Edit your Account</h4>
            <a href="#" style="color: #8b0078; font-weight: 500;">Change password</a> -->
          </div>

          @auth
          <div class="mb-3">
            <p> Welcome back, <strong>{{ Auth::user()->name ?? 'User' }}</strong>!</p>
          </div>
          <form method="POST" action="{{ route('customer.logout') }}">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger">Logout</button>
          </form>
          @endauth
        </div>
      </div>
    </div>
  </div>
</section>
@endsection