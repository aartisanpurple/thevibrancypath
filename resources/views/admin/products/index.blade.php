@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Products</h4>
                <div class="page-title-right">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary waves-effect waves-light">
                        <i class="bx bx-plus me-1"></i> Add New Product
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-check-all me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    @if($product->image)
                                        <img src="{{ asset($product->image) }}" alt="Product Image" class="rounded avatar-sm">
                                    @else
                                        <span class="badge bg-warning">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category_name ?? 'N/A' }}</td>
                                <td>{{ $product->subcategory_name ?? 'N/A' }}</td>
                                <td>${{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    @if($product->product_status == 0)
                                        <span class="badge bg-success">Available</span>
                                    @elseif($product->product_status == 1)
                                        <span class="badge bg-warning">Out of Stock</span>
                                    @else
                                        <span class="badge bg-danger">Discontinued</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.products.show', $product->id) }}" 
                                           class="btn btn-info btn-sm" 
                                           data-bs-toggle="tooltip" 
                                           data-bs-placement="top" 
                                           title="View">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="{{ route('admin.products.edit', $product->id) }}" 
                                           class="btn btn-primary btn-sm"
                                           data-bs-toggle="tooltip" 
                                           data-bs-placement="top" 
                                           title="Edit">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-danger btn-sm delete-product" 
                                                data-id="{{ $product->id }}"
                                                data-url="{{ route('admin.products.destroy', $product->id) }}"
                                                data-bs-toggle="tooltip" 
                                                data-bs-placement="top" 
                                                title="Delete">
                                            <i class="bx bx-trash"></i>
                                        </button>
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

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this product?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#datatable').DataTable();

    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // Handle delete button click
    $('.delete-product').click(function() {
        var id = $(this).data('id');
        $('#deleteForm').attr('action', '/admin/products/' + id);
        $('#deleteModal').modal('show');
    });
});
</script>
@endsection
