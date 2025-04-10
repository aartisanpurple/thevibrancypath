@extends('layouts.admin')

@section('content')
<style>
    html, body {
        height: 100%;
        margin: 0;
        overflow: hidden; /* Prevent scrollbar */
    }

    .form-wrapper {
        height: 100vh;
        overflow: hidden;
    }
</style>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card shadow p-4" style="width: 100%; max-width: 500px;">
        <h4 class="mb-4 text-center">
            @if(isset($category)) Edit Category @else Add Category @endif
        </h4>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Category Form --}}
        <form id="categoryForm" action="{{ route('admin.category.store') }}" method="POST" novalidate>
            @csrf
            @if(isset($category))
                <input type="hidden" name="category_id" value="{{ $category->id }}">
            @endif

            <div class="mb-3">
                <label for="category_name" class="form-label">Category Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                    id="category_name" name="name"
                    value="{{ old('name', $category->name ?? '') }}"
                    placeholder="Enter Category Name"
                    required
                    data-parsley-required="true"
                    data-parsley-required-message="Category name is required">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="invalid-feedback" id="category-name-error"></div>
            </div>

            <div class="mb-3">
                <label for="category_status" class="form-label">Status</label>
                <select class="form-select @error('category_status') is-invalid @enderror"
                    id="category_status" name="category_status"
                    required
                    data-parsley-required="true"
                    data-parsley-required-message="Status is required">
                    <option value="">Select Status</option>
                    <option value="0" {{ (old('category_status', $category->category_status ?? '') == 0) ? 'selected' : '' }}>Active</option>
                    <option value="1" {{ (old('category_status', $category->category_status ?? '') == 1) ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('category_status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="invalid-feedback" id="category-status-error"></div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary" id="saveCategoryBtn">
                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                    @if(isset($category)) Update Category @else Save Category @endif
                </button>
            </div>
        </form>
    </div>
</div>


@endsection
