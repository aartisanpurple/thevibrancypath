@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Users</h4>
                <a href="javascript:void(0);" class="btn btn-sm btn-primary" id="addUserBtn">Add User</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    </p>
                    <table id="userTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead style="background-color: #f2f2f2;">
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>User name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Mobile</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>@if($user->image)<img src="{{ asset('/'.$user->image) }}" alt="User Image" style="width: 50px; height: 50px; border-radius: 50%;">@else<img src="{{ asset('assets/images/users/profile-blank.jpeg') }}" alt="User Image" style="width: 50px; height: 50px; border-radius: 50%;">@endif</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->user_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->user_type }}</td>
                                    <td>{{ $user->mobile_no }}</td>
                                    <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-primary editUserBtn"
                                            data-id="{{ $user->id }}" data-url="{{ route('admin.user.edit', $user->id) }}" id="editUserBtn">
                                                <i class="bx bx-edit"></i>
                                        </a>

                                        <a href="javascript:void(0);" 
                                            class="btn btn-sm btn-danger deleteUserBtn"
                                            data-id="{{ $user->id }}"
                                            data-url="{{ route('admin.user.destroy', $user->id) }}">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <form id="userForm" method="POST" action="{{ route('admin.user.store') }}" data-parsley-validate>
                @csrf
                <input type="hidden" name="id" id="user_id">

                <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="user_name"  data-parsley-trigger="change">
                </div>
                <div class="col-md-6">
                    <label class="form-label">User Name</label>
                    <input type="text" name="user_name" class="form-control" id="user_user_name"  data-parsley-trigger="change">
                </div>
               
                <div class="col-md-6">
                    <label class="form-label">Mobile No</label>
                    <input type="text" name="mobile_no" class="form-control" id="user_mobile_no"  data-parsley-trigger="change">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="user_email"  data-parsley-trigger="change">
                </div>
                <div class="col-md-6">
                    <label class="form-label">User Type</label>
                    <select name="user_type" class="form-select" id="user_user_type"  data-parsley-trigger="change">
                    <option value="">Select User Type</option>
                    <option value="admin">Admin</option>
                    <option value="customer">Customer</option>
                    <option value="vendor">Vendor</option>
                    <!-- Add more options as needed -->
                    </select>
                </div>

               
                <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" id="user_status"  data-parsley-trigger="change">
                    <option value="">Select Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <!-- Add more options as needed -->
                    </select>
                </div>
            
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>

@endsection
