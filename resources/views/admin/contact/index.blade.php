@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Contact Us</h4>
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contactModal">Add Contact</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                                {{-- Search Form --}}
                    <form method="GET" action="{{ route('admin.contact.index') }}" class="mb-4 d-flex">
                        <input type="text" name="search" class="form-control me-2" placeholder="Search by name/email/subject..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>

                    {{-- Table --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle w-100">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->contact }}</td>
                                        <td>{{ $contact->subject }}</td>
                                        <td>{{ $contact->message }}</td>
                                        <td class="text-center">
                                            <a href="javascript:void(0);" class="btn btn-sm btn-primary editContactBtn"
                                                data-id="{{ $contact->id }}"
                                                data-name="{{ $contact->name }}"
                                                data-email="{{ $contact->email }}"
                                                data-contact="{{ $contact->contact }}"
                                                data-subject="{{ $contact->subject }}"
                                                data-message="{{ $contact->message }}">
                                                <i class="bx bx-edit"></i>
                                            </a>

                                            <a href="javascript:void(0);" 
                                                class="btn btn-sm btn-danger deleteContactBtn"
                                                data-id="{{ $contact->id }}"
                                                data-url="{{ route('admin.contact.destroy', $contact->id) }}">
                                                <i class="bx bx-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No contacts found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-3">
                        {{ $contacts->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <form id="contactForm" method="POST" action="{{ route('admin.contact.store') }}" data-parsley-validate>
                @csrf
                <input type="hidden" name="id" id="contact_id">

                <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">Add Contact</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="contact_name" required data-parsley-trigger="change">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="contact_email" required data-parsley-trigger="change">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Mobile</label>
                    <input type="number" name="contact" class="form-control" id="contact_mobile" required data-parsley-trigger="change">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Subject</label>
                    <input type="text" name="subject" class="form-control" id="contact_subject" required data-parsley-trigger="change">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-control" id="contact_message" required data-parsley-trigger="change"></textarea>
                </div>
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
