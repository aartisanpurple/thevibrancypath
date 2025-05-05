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
    <form action="" method="POST">
        @csrf
        <div class="mb-3">
            <label for="appointment_time" class="form-label">Date & Time</label>
            <input type="datetime-local" class="form-control" name="appointment_time" required>
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
