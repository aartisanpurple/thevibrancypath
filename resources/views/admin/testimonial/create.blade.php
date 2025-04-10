@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Create Testimonial</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    </p>

                    <form id="addTestimonialForm" action="your-server-endpoint" method="POST">
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required
                                    placeholder="Enter Name">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="name" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" required placeholder="Enter Message"></textarea>
                            </div>

                            <div class="mb-3 col-6">
                                <label for="photo" class="form-label">Photo</label>
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview"
                                            style="background-image: url({{ asset('assets/images/users/profile-blank.jpeg') }});">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('admin.testimonial.index') }}" class="btn btn-outline-secondary ms-1">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
