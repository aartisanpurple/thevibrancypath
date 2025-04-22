@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">@if (isset($testimonial->id)) Edit Testimonial @else Create Testimonial @endif</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form id="@if (isset($testimonial->id)) editTestimonialForm @else addTestimonialForm @endif" 
                        action="{{ isset($testimonial->id) ? route('admin.testimonial.update', $testimonial->id) : route('admin.testimonial.store') }}" 
                        method="POST" 
                        enctype="multipart/form-data" 
                        parsley-validate>
                        @csrf
                        @if (isset($testimonial->id))
                            @method('PUT')
                            <input type="hidden" name="testimonial_id" value="{{ $testimonial->id }}">
                        @endif
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="name" class="form-label">Name</label>
                                @if (isset($testimonial->name))
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $testimonial->name }}" required parsley-trigger="change" parsley-required="true" placeholder="Enter Name">
                                @else
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required parsley-trigger="change" parsley-required="true" placeholder="Enter Name">
                                @endif
                            </div>

                            <div class="mb-3 col-6">
                                <label for="name" class="form-label">Message</label>
                                @if (isset($testimonial->message))
                                    <textarea class="form-control" id="message" name="message" required parsley-trigger="change" parsley-required="true" placeholder="Enter Message">{{ $testimonial->message }}</textarea>
                                @else
                                    <textarea class="form-control" id="message" name="message" required parsley-trigger="change" parsley-required="true" placeholder="Enter Message">{{ old('message') }}</textarea>
                                @endif
                            </div>

                            <div class="mb-3 col-6">
                                <label for="photo" class="form-label">Photo</label>
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        @if (isset($testimonial->image))
                                            <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" parsley-trigger="change" parsley-required="true" />
                                        @else
                                            <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" parsley-trigger="change" parsley-required="true" />
                                        @endif
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        @if (isset($testimonial->image))
                                            <div id="imagePreview"
                                                style="background-image: url({{ asset($testimonial->image) }});">
                                            </div>
                                        @else
                                            <div id="imagePreview"
                                                style="background-image: url({{ asset('assets/images/users/profile-blank.jpeg') }});">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @if (isset($testimonial->image))
                                    <input type="hidden" name="existing_image" value="{{ $testimonial->image }}">
                                @endif
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">@if (isset($testimonial->id)) Update @else Save @endif</button>
                        @if (isset($testimonial->id))
                            <button type="button" class="btn btn-outline-secondary ms-1 delete-testimonial" 
                                data-url="{{ route('admin.testimonial.destroy', $testimonial->id) }}"
                                data-id="{{ $testimonial->id }}">Delete</button>
                        @else
                            <a href="{{ route('admin.testimonial.index') }}" class="btn btn-outline-secondary ms-1">Cancel</a>
                        @endif
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageUpload = document.getElementById('imageUpload');
        const imagePreview = document.getElementById('imagePreview');

        if (imageUpload) {
            imageUpload.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.style.backgroundImage = `url(${e.target.result})`;
                    }
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        }
    });
</script>
@endpush
