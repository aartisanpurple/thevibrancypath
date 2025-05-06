@extends('layouts.admin')

@section('content')
    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Testimonials</h4>
            <a class="btn btn-primary" href="{{ route('admin.testimonial.create') }}">Add Testimonial</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="testimonialsTable" class="table table-bordered table-striped dt-responsive nowrap w-100">
                <thead style="background-color: #f2f2f2;">
                    <tr>
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
                                @if ($testimonial->image)
                                    <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}'s Photo" width="50" class="rounded-circle">
                                @else
                                    <span class="badge bg-warning">No Image</span>
                                @endif
                            </td>
                            <td>{{ $testimonial->name }}</td>
                            <td>{{ $testimonial->message }}</td>
                            <td class="d-flex gap-1">
                                <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{ route('admin.testimonial.destroy', $testimonial->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
