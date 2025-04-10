@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <!-- Page title -->
     
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0"> @if(isset($product)) Edit Product @else Add New Product @endif</h4>
                <div class="page-title-right">
                    
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary waves-effect waves-light">
                        <i class="bx bx-plus-circle me-1"></i> Add Category
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary waves-effect waves-light">
                        <i class="bx bx-arrow-back align-middle me-2"></i> Back to Products
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                {{-- Success Message --}}
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    {{-- Error Message --}}
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-block-helper me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <form id="productForm" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                        @csrf
                        @if(isset($product))
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        @endif
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                        placeholder="Enter Product Name" id="name" name="name" value="@if(isset($product)){{ $product->name }}@else{{ old('name') }}@endif" required data-parsley-required-message="Product name is required" data-parsley-required="true" data-parsley-minlength="3">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                          placeholder="Enter Price" id="price"  step="0.01" name="price" value="@if(isset($product)){{ $product->price }}@else{{ old('price') }}@endif" required data-parsley-required-message="Price is required" data-parsley-required="true" data-parsley-type="number" data-parsley-min="0">
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select class="form-select @error('category_id') is-invalid @enderror" 
                                            id="category_id" name="category_id" required data-parsley-required="true">
                                        <option value="">Select Category</option>
                                        <!-- Add categories from database -->
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" data-url="{{ route('admin.products.getSubcategories', $category->id) }}" data-type="{{ $category->name }}" @if(isset($product) && $product->category_id == $category->id) selected @endif>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                               id="price" name="price" value="{{ old('price') }}" step="0.01"  data-parsley-required-message="Price is required" data-parsley-required="true" data-parsley-type="number" data-parsley-min="0">
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div> -->
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="subcategory_id" class="form-label">Sub Category</label>
                                    <select class="form-select @error('subcategory_id') is-invalid @enderror" 
                                            id="subcategory_id" name="subcategory_id" required data-parsley-required="true">
                                        <option value="">Select Sub Category</option>         
                                        @if(isset($product))    
                                            @foreach($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}" data-type="{{ $subcategory->name }}"  @if(isset($product) && $product->subcategory_id == $subcategory->id) selected @endif>
                                                    {{ $subcategory->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('subcategory_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="stock" class="form-label">Stock Quantity</label>
                                    <input type="number" class="form-control @error('stock') is-invalid @enderror" 
                                        placeholder="Enter Stock Quantity" id="stock" name="stock" value="@if(isset($product)){{ $product->stock }}@else{{ old('stock') }}@endif" required data-parsley-required-message="Stock is required" data-parsley-required="true" data-parsley-type="number" data-parsley-min="0">
                                    @error('stock')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="product_status" class="form-label">Product Status</label>
                                    <select class="form-select @error('product_status') is-invalid @enderror" 
                                            id="product_status" name="product_status" required>
                                        <option value="0">Available</option>
                                        <option value="1">Out of Stock</option>
                                        <option value="2">Discontinued</option>
                                    </select>
                                    @error('product_status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      placeholder="Enter Description" id="description" name="description" rows="4">@if(isset($product)){{ $product->description }}@else{{ old('description') }}@endif</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Front Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                           id="image" name="image" accept="image/*">
                                           <img id="imagePreview" src="{{ isset($product) && $product->image ? asset('/' . $product->image) : '#' }}" class="mt-2 img-thumbnail" style="max-height: 200px; {{ isset($product) && $product->image ? '' : 'display: none;' }}">
       
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="image_back" class="form-label">Back Image</label>
                                    <input type="file" class="form-control @error('image_back') is-invalid @enderror" 
                                           id="image_back" name="image_back" accept="image/*">
                                    @error('image_back')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="image_left" class="form-label">Left Image</label>
                                    <input type="file" class="form-control @error('image_left') is-invalid @enderror" 
                                           id="image_left" name="image_left" accept="image/*">
                                    @error('image_left')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div id="courseFields" style="display: none;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="course_doc" class="form-label">Course Document</label>
                                        <input type="file" class="form-control @error('course_doc') is-invalid @enderror" 
                                            id="course_doc" name="course_doc" @if(isset($product)) disabled @endif>
                                        @error('course_doc')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="course_url" class="form-label">Course URL</label>
                                        <input type="url" class="form-control @error('course_url') is-invalid @enderror" 
                                            id="course_url" name="course_url" value="@if(isset($product)){{ $product->course_url }}@else{{ old('course_url') }}@endif" @if(isset($product)) disabled @endif>
                                        @error('course_url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="course_status" class="form-label">Course Status</label>
                                        <select class="form-select @error('course_status') is-invalid @enderror" 
                                                id="course_status" name="course_status" @if(isset($product)) disabled @endif>
                                            <option value="">Select Course Status</option>
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                        </select>
                                        @error('course_status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="reset" class="btn btn-secondary me-2">Reset</button>
                            <button type="submit" id="submitBtn" class="btn btn-primary">
                                {{ isset($product) ? 'Update Product' : 'Add Product' }}
                            </button>
                            <!-- <button type="submit"  id="submitBtn" class="btn btn-primary">Add Product</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="categoryForm" action="{{ route('admin.category.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="name" required parsley-required="true" parsley-required-message="Category name is required">
                        <div class="invalid-feedback" id="category-name-error"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="category_status" class="form-label">Status</label>
                        <select class="form-select" id="category_status" name="status"  parsley-required="true" required>
                            <option value="0">Active</option>
                            <option value="1">Inactive</option>
                        </select>
                        <div class="invalid-feedback" id="category-status-error"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveCategoryBtn">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        Save Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Image preview logic can be added here if needed
</script>
@endsection