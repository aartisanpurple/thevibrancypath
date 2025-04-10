@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Testimonials</h4>
                <a class="btn btn-primary" href="{{ route('admin.testimonial.create') }}">Add Testimonial</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable"
                        class="table align-middle dt-responsive nowrap w-100 table-check dataTable no-footer dtr-inline">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="{{ asset('assets/images/users/avatar-7.jpg') }}" alt="John's Photo"
                                        width="50" class="rounded-circle"></td>
                                <td>John Doe</td>
                                <td>This product is amazing! It has changed the way I work and improved my productivity.
                                </td>

                            </tr>
                            <tr>
                                <td><img src="{{ asset('assets/images/users/avatar-2.jpg') }}" alt="Jane's Photo"
                                        width="50" class="rounded-circle"></td>
                                <td>Jane Smith</td>
                                <td>Highly recommend this service! It’s user-friendly and very efficient.</td>

                            </tr>
                            <tr>
                                <td><img src="{{ asset('assets/images/users/avatar-3.jpg') }}" alt="Emily's Photo"
                                        width="50" class="rounded-circle"></td>
                                <td>Emily Davis</td>
                                <td>I had a great experience. The team was very supportive and helped me every step of the
                                    way.</td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
