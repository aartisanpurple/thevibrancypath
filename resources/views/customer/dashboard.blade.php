@extends('layouts.customer.app')

@section('content')
<section class="py-5" style="background-color: #faf7f3;">
  <div class="container">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-lg-3 mb-4">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action">My Account</a>
          <a href="#" class="list-group-item list-group-item-action">Basic Details</a>
          <a href="#" class="list-group-item list-group-item-action active" style="background-color: #8b0078; border-color: #8b0078; color: #fff;">My Purchase</a>
          <a href="#" class="list-group-item list-group-item-action">My Courses</a>
          <a href="#" class="list-group-item list-group-item-action">Favourites</a>
          <a href="#" class="list-group-item list-group-item-action">My Subscription</a>
          <a href="#" class="list-group-item list-group-item-action">My Appointments</a>
        </div>
      </div>

      <!-- Purchase Content -->
      <div class="col-lg-9">
        <div class="card p-4 shadow-sm border-0">
          <h4 class="mb-3">My Purchase Products</h4>
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
              <strong>From:</strong> 02/02/2025 &nbsp;
              <strong>To:</strong> 01/04/2025
            </div>
            <div class="input-group" style="width: 250px;">
              <input type="text" class="form-control" placeholder="Search here.." />
              <span class="input-group-text"><i class="bi bi-search"></i></span>
            </div>
          </div>
          
          <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
              <thead class="table-light">
                <tr>
                  <th>Sr. No</th>
                  <th>Date</th>
                  <th>Products</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>02/04/2025</td>
                  <td class="text-start">
                    <img src="https://via.placeholder.com/40x50" class="me-2" style="height: 50px;" alt="eBook" />
                    Your Vibrancy Signature eBook
                  </td>
                  <td>eBooks</td>
                  <td>$20</td>
                  <td>Delivered on<br>02/04/2025</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>02/04/2025</td>
                  <td class="text-start">
                    <img src="https://via.placeholder.com/30x60" class="me-2" style="height: 60px;" alt="Essence" />
                    Abundance Essence - Gold
                  </td>
                  <td>Essence</td>
                  <td>$20</td>
                  <td>Delivered on<br>02/04/2025</td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

@endsection
