@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Create Blog</h4>
                {{-- <a class="btn btn-primary" href="">Add Blog</a> --}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="addBlogForm" action="your-server-endpoint" method="POST">
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="blogTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" id="blogTitle" name="title" required
                                    placeholder="Enter blog title">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" required
                                    placeholder="Slug" readonly>
                            </div>

                            <div class="mb-3 col-6">
                                <label for="blogAuthor" class="form-label">Author</label>
                                <input type="text" class="form-control" id="blogAuthor" name="author" required
                                    placeholder="Enter author name">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="blogDate" class="form-label">Date Published</label>
                                <input type="date" class="form-control" id="blogDate" name="datePublished" required>
                            </div>

                            <div class="mb-3">
                                <label for="blogContent" class="form-label">Content</label>
                                <div id="blogContent" class="mb-5">
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 70px;">Save</button>
                        <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary ms-1"
                            style="margin-top: 70px;">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        const quill = new Quill('#blogContent', {
            theme: 'snow'
        });
        $(document).ready(function() {
            $('#blogTitle').on('keyup', function() {
                var title = $(this).val();
                var slug = title.trim()
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');
                $('#slug').val(slug);
            });
        });
    </script>
@endsection
