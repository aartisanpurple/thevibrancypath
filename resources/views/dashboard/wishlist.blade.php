@extends('layouts.customer.app')

@section('content')
<section class="py-5" style="background-color: #faf7f3;">
  <div class="container">
    <div class="row">
      <!-- Sidebar -->
      @include('dashboard.partials.menu')

      <!-- Wishlist Content -->
      <div class="col-lg-9">
        <div class="card p-4 shadow-sm border-0">

          <h4 class="mb-3">My Wishlist</h4>

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
                  <th>Product</th>
                  <th>Price</th>
                  <th>Added On</th>
                </tr>
              </thead>
              <tbody>
                @forelse($wishlists as $index => $wishlist)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>
                    <div class="d-flex align-items-center">
                   
                      {{ $wishlist->product_name }}
                    </div>
                  </td>
                  <td>${{ number_format($wishlist->product_price, 2) }}</td>
                  <td>{{ $wishlist->created_at->format('d M Y') }}</td>
                </tr>
                @empty
                <tr>
                  <td colspan="4" class="text-center">No items in your wishlist.</td>
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
