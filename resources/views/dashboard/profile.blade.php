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

          <form method="POST" action="">
            @csrf
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" value="{{ $user->email }}" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Mobile No</label>
              <input type="text" name="mobile_no" class="form-control" value="{{ $user->mobile_no }}">
            </div>
            <!-- <button type="submit" class="btn" style="background-color: #8b0078; color: white;">Update</button> -->
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection