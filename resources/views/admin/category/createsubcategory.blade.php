@extends('layouts.admin')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card shadow p-4" style="width: 100%; max-width: 500px;">
        <h4 class="mb-4 text-center">
            @if(isset($subcategory)) Edit Sub Category @else Add Sub Category @endif
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
        <form id="subCategoryForm" action="{{ route('admin.subcategory.store') }}">
            @csrf
            <input type="hidden" name="subcategory_id" value="{{ isset($subcategory->id) ? $subcategory->id : '' }}">
            <div class="mb-3">
                <label for="name" class="form-label">Sub Category Name</label>
                <input type="text" class="form-control" id="subcategory_name" placeholder="Enter Sub Category Name" name="name" value="{{ isset($subcategory->name) ? $subcategory->name : old('name') }}" required parsley-required="true" parsley-required-message="Sub Category name is required">
                <div class="invalid-feedback" id="subcategory-name-error"></div>
            </div>
            <div class="mb-3">
                <label for="parentCategory" class="form-label">Parent Category</label>
                <select class="form-select select-disabled" id="parentCategory" name="parent_id" required parsley-required="true" parsley-required-message="Parent Category is required">
                    
                    <option value="">Select Parent Category</option>
                    @if(isset($subcategory))
                    $parentCategory = $parentCategory;
                    @else
                    $parentCategory = $selectedCategory->id;
                    @endif
                    @if(isset($category) && $category->count() > 0)
                        @foreach($category as $cat)
                            @if(is_null($cat->deleted_at))
                                <option value="{{ $cat->id }}" 
                                    {{ $cat->id == ($parentCategory ?? $selectedCategory->id ?? '') ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endif
                        @endforeach
                    @endif

                  
                </select>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="category_status" name="status" required parsley-required="true" parsley-required-message="Status is required">
                    <option value="">Select Status</option>
                    <option value="0" {{ isset($subcategory->status) ? ($subcategory->status == 0 ? 'selected' : '') : (old('subcategory_status') == '0' ? 'selected' : '') }}>Active</option>
                    <option value="1" {{ isset($subcategory->status) ? ($subcategory->status == 1 ? 'selected' : '') : (old('subcategory_status') == '1' ? 'selected' : '') }}>Inactive</option>
                </select>
                <div class="invalid-feedback" id="subcategory-status-error"></div>
            </div>



            <button type="submit" class="btn btn-primary" id="savesubCategoryBtn">
                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                @if(isset($subcategory))
                    Update Sub Category
                @else
                    Save Sub Category
                @endif
            </button>
        </form>
    </div>
</div>

@endsection
