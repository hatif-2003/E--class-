@extends("admin.adminlayout")
@section("title", "add category")
@section("content")
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-3">
            @include('admin.adminsidebar')
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="student-table-container">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="h4 m-0 text-dark fw-semibold">Add Category</h2>
                        <a href="{{ route("categories.index") }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-list-check"></i> Manage Category</a>
                    </div>
                    <div class="form-container ">

                        <div class="card  shadow-sm">
                            <div class="card-body">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Oops! Kuch galat hai:</strong>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <form action="{{ route("categories.store") }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="category_title" class="form-label">Category Title</label>
                                        <input type="text" class="form-control" id="category_title" name="cat_title" value="{{ old("Cat_title") }}" placeholder="Enter category title">
                                        @error('cat_title')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_description" class="form-label">Category Description</label>
                                        <textarea class="form-control" id="category_description" name="cat_description" value="{{ old("cat_description") }}" placeholder="Enter category description">
                                       
                                        </textarea>
                                         @error('cat_description')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.script')
@endsection