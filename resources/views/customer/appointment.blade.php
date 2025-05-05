@extends('layouts.customer.app')

@section('content')
<!-- Hero Section -->
<section class="inner_banner">
    <img src="{{ asset('assets/images/inner-banner.svg') }}" class="w-100" alt="">
    <div class="inner_banner_caption">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2>Appointment</h2>
                <p>Discover Your Soul’s Purpose</p>
            </div>
        </div>

    </div>
</section>
<section class="one-person-section py-5">
    <div class="container">
        <h4>Book Appointment</h4>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="{{ route('customer.appointment.store') }}" method="POST">
            @csrf
            <!-- Show these only if user is not logged in  -->
            @guest
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-3">
                <label for="mobile_no" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" name="mobile_no" required>
            </div>
            @endguest

            <div class="mb-3">
                <label for="appointment_time" class="form-label">Date & Time</label>
                <input type="datetime-local" min="{{ date('Y-m-d\TH:i') }}" class="form-control" name="appointment_time" required>
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Notes (optional)</label>
                <textarea class="form-control" name="notes" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Book Now</button>
        </form>

    </div>
</section>

@endsection