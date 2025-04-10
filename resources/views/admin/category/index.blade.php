@extends('layouts.admin')

@section('content')
        <!-- Page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Category</h4>
                <div class="page-title-right">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary waves-effect waves-light">
                        <i class="bx bx-plus me-1"></i> Add New Category
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Category List</h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr style="background-color: #f2f2f2;">
                                <th>Category ID</th>
                                <th>Category Name</th>
                                <th>Category Status</th>
                                <th>SubCategory</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->category_status == 0 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                    <div class="d-flex flex-wrap gap-2 mt-2">
                                    @foreach ($category->subcategories as $sub)
                                    <div class="badge  text-dark border position-relative pe-4 me-2 mb-2 d-inline-flex align-items-center" style="background-color: rgb(217 184 222);">
                                        {{ $sub->name }}

                                            <!-- Edit button -->
                                            <a href="{{ route('admin.subcategory.edit', $sub->id) }}" class="btn btn-sm btn-warning text-white ms-2 py-0 px-2" title="Edit Subcategory">
                                            <i class="bx bx-edit"></i>
                                            </a>
                                            <!-- Remove button -->
                                            <button type="button"
                                                class="btn-close btn-sm position-absolute top-50 translate-middle-y end-0 me-1 remove-tag" style="filter: invert(40%) sepia(90%) saturate(500%) hue-rotate(330deg);"
                                                data-id="{{ $sub->id }}"
                                                data-url="{{ route('admin.subcategory.destroy', $sub->id) }}"
                                                title="Delete">
                                            </button>
                                        </div>
                                    @endforeach

                                    </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                        <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary" title="Edit Category"><i class="bx bx-edit"></i></a>
                                        <button type="button" class="btn btn-danger remove-category" title="Delete Category" data-id="{{ $category->id }}" data-url="{{ route('admin.category.destroy', $category->id) }}" data-toggle="modal" data-target="#deleteModal"><i class="bx bx-trash"></i></button>
                                        <a href="{{ route('admin.subcategory.showSubCategory', $category->id) }}" title="Add Subcategory" class="btn btn-success"><i class="bx bx-plus"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
