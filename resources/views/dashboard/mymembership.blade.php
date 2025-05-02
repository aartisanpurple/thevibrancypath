@extends('layouts.customer.app')

@section('content')
<section class="py-5" style="background-color: #faf7f3;">
  <div class="container">
    <div class="row">
      <!-- Sidebar -->

      @include('dashboard.partials.menu')
      <!-- Purchase Content -->
      <div class="col-lg-9">
        <div class="card p-4 shadow-sm border-0">

          <h4 class="mb-3">My Membership</h4>

          <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
              <!-- <strong>From:</strong> 02/02/2025 &nbsp;
        <strong>To:</strong> 01/04/2025 -->
            </div>
            <div class="input-group" style="width: 250px;">
              <input type="text" class="form-control" placeholder="Search here.." />
              <span class="input-group-text"><i class="bi bi-search"></i></span>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                
                  <th>Type</th>
                  <th>start_date</th>
                  <th>end_date</th>
              


                </tr>
              </thead>
              <tbody>
                @forelse($membership as $index => $membership)
                <tr>
               
                  <td>{{ $membership->type }}</td>
                  <td>{{ $membership->start_date }}</td>
                  <td>
                  {{ $membership->end_date }}
                  </td>
                
                </tr>
                @empty
                <tr>
                  <td colspan="7" class="text-center">No Membership found.</td>
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