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
            <h4 class="mb-0">Edit your Account</h4>
            <!-- <a href="#" style="color: #8b0078; font-weight: 500;" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Change password</a>
           -->
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

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn" style="background-color: #8b0078; color: white;">Save Changes</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Current Password</label>
            <input type="password" name="current_password" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">New Password</label>
            <input type="password" name="new_password" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Confirm New Password</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn" style="background-color: #8b0078; color: white;">Save Changes</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection
