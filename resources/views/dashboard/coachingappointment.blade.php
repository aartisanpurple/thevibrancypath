@extends('layouts.customer.app')

@section('content')
<section class="py-5" style="background-color: #faf7f3;">
  <div class="container">
    <div class="row">
      <!-- Sidebar -->
      @include('dashboard.partials.menu')

      <!-- Appointment Content -->
      <div class="col-lg-9">
        <div class="card p-4 shadow-sm border-0">

          <h4 class="mb-3">My Coaching Appointments</h4>

          <div class="d-flex justify-content-between align-items-center mb-3">
            <div></div>
            <div class="input-group" style="width: 250px;">
              <input type="text" class="form-control" placeholder="Search here..." />
              <span class="input-group-text"><i class="bi bi-search"></i></span>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Date & Time</th>
                  <th>Notes</th>
                  <th>Created At</th>
                </tr>
              </thead>
              <tbody>
                @forelse($orders as $index => $appointment)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('d M Y, h:i A') }}</td>
                  <td>{{ $appointment->notes ?? '—' }}</td>
                  <td>{{ $appointment->created_at->format('d M Y') }}</td>
                </tr>
                @empty
                <tr>
                  <td colspan="4" class="text-center">No coaching appointments found.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection
