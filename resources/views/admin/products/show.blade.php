@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Product Details</h4>
                <div class="page-title-right">
                    <div class="btn-group" role="group">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary waves-effect waves-light me-2">
                            <i class="bx bx-edit align-middle me-2"></i> Edit Product
                        </a>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary waves-effect waves-light">
                            <i class="bx bx-arrow-back align-middle me-2"></i> Back to Products
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Left side - Image Carousel -->
                        <div class="col-md-6">
                            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="0" class="active"></button>
                                    @if($product->image_back)
                                        <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="1"></button>
                                    @endif
                                    @if($product->image_left)
                                        <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="2"></button>
                                    @endif
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset($product->image) }}" class="d-block w-100" alt="Front View">
                                    </div>
                                    @if($product->image_back)
                                    <div class="carousel-item">
                                        <img src="{{ asset($product->image_back) }}" class="d-block w-100" alt="Back View">
                                    </div>
                                    @endif
                                    @if($product->image_left)
                                    <div class="carousel-item">
                                        <img src="{{ asset($product->image_left) }}" class="d-block w-100" alt="Left View">
                                    </div>
                                    @endif
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>

                        <!-- Right side - Product Details -->
                        <div class="col-md-6">
                            <!-- Product Title -->
                            <h2 class="mb-4">{{ $product->name }} </h2>

                            <!-- Product Meta Information -->
                            <div class="d-flex align-items-center  gap-4  mb-4">
                                <div class="me-4 p-2 border border-dashed rounded">
                                    <i class="bx bx-dollar fs-4 me-2"></i>
                                    <span class="fs-4 fw-bold">${{ number_format($product->price, 2) }}</span>
                                </div>
                                
                                <div class="me-4 p-2 border border-dashed rounded">
                                    <i class="bx bx-package fs-4 me-2"></i>
                                    <span class="fs-5">Stock: {{ $product->stock }}</span>
                                </div>
                                <!-- <div class="me-4 p-2 border border-dashed rounded">
                                    <i class="bx bx-check-circle fs-4 me-2"></i>
                                    <span class="badge {{ $product->product_status == 0 ? 'bg-success' : ($product->product_status == 1 ? 'bg-warning' : 'bg-danger') }}">
                                        {{ $product->product_status == 0 ? 'Available' : ($product->product_status == 1 ? 'Out of Stock' : 'Discontinued') }}
                                    </span>
                                </div> -->
                            </div>

                            <!-- Category -->
                            <div class="mb-4">
                                <h5 class="font-size-15">Category:</h5>
                                <span class="badge bg-info fs-6">{{ $product->category->name ?? 'N/A' }}</span>
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <h5 class="font-size-15">Description</h5>
                                <p class="text-muted">{{ $product->description }}</p>
                            </div>

                            <!-- Course Information -->
                            <div class="course-info border-top pt-4">
                                <h5 class="font-size-15 mb-3">Course Information</h5>
                                <div class="d-flex flex-wrap gap-3">
                                    <div>
                                        <i class="bx bx-video fs-4 me-2"></i>
                                        <span class="badge {{ $product->course_status == 1 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $product->course_status == 1 ? 'Course Active' : 'Course Inactive' }}
                                        </span>
                                    </div>
                                    @if($product->course_url)
                                    <div>
                                        <i class="bx bx-link fs-4 me-2"></i>
                                        <a href="{{ $product->course_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                            View Course
                                        </a>
                                    </div>
                                    @endif
                                    @if($product->course_doc)
                                    <div>
                                        <i class="bx bx-file fs-4 me-2"></i>
                                        <a href="{{ asset($product->course_doc) }}" target="_blank" class="btn btn-sm btn-outline-info">
                                            Download Document
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Initialize the carousel
    document.addEventListener('DOMContentLoaded', function() {
        new bootstrap.Carousel(document.querySelector('#productCarousel'), {
            interval: 3000,
            wrap: true
        });
    });
</script>
@endsection