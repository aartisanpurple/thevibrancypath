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
                <table id="testimonialsTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead style="background-color: #f2f2f2;">
                            <tr style="background-color: #f2f2f2;">
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonials as $testimonial)
                                <tr>
                                    <td>
                                        @if($testimonial->image)
                                            <img src="{{ $testimonial->image }}" alt="{{ $testimonial->name }}'s Photo"
                                                width="50" class="rounded-circle">
                                        @else
                                            <span class="badge bg-warning">No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ $testimonial->name }}</td>
                                    <td>{{ $testimonial->message }}</td>
                                    <td>
                                        <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}"
                                            class="btn btn-primary"><i class="bx bx-edit"></i></a>
                                        <a href="{{ route('admin.testimonial.destroy', $testimonial->id) }}"
                                            class="btn btn-danger"><i class="bx bx-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <!-- <tbody>
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
                                <td>Highly recommend this service! It's user-friendly and very efficient.</td>

                            </tr>
                            <tr>
                                <td><img src="{{ asset('assets/images/users/avatar-3.jpg') }}" alt="Emily's Photo"
                                        width="50" class="rounded-circle"></td>
                                <td>Emily Davis</td>
                                <td>I had a great experience. The team was very supportive and helped me every step of the
                                    way.</td>

                            </tr>
                        </tbody> -->
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
