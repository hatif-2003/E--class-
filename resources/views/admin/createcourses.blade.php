@extends("admin.adminlayout")
@section("title", "add courses")
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
                        <h2 class="h4 m-0 text-dark fw-semibold">Add Courses</h2>
                        <a href="{{ route("courses.index") }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-list-check"></i> Manage Courses</a>
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
                                <form action="{{ route("courses.store") }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="title" class="form-label"> Title</label>
                                                <input type="text" class="form-control" id="title" name="title" value="{{ old("title") }}" placeholder="Enter  title">
                                                @error('title')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="author" class="form-label">Instructor</label>
                                                <input type="text" class="form-control" id="author" name="author" value="{{ old("author") }}" placeholder="Enter author name">
                                                @error('author')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="category" class="form-label">Category</label>
                                                <select class="form-select" id="category" name="category_id">
                                                    <option value="" disabled selected>Select Category</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('category', $course->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->cat_title }}
                                                    </option>

                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="fee" class="form-label">Fee</label>
                                                <input type="text" class="form-control" id="fee" name="fees" value="{{ old("fees") }}" placeholder="Enter fee">
                                                @error('fees')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="discount_price" class="form-label">Discount Price</label>
                                                <input type="text" class="form-control" id="discount_price" name="discount_price" value="{{ old("discount_price") }}" placeholder="Enter discount price">
                                                @error('discount_price')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Upload Image</label>
                                                <input type="file" class="form-control" id="image" name="image" value="{{ old("image") }}" placeholder="Enter image">
                                                @error('image')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control" id="description" name="description" value="" placeholder="Enter description">{{ old("description") }}</textarea>
                                                @error('description')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="duration" class="form-label">Duration</label>
                                                    <input type="text" class="form-control" id="discount_price" name="duration" value="{{ old("duration") }}" placeholder="Enter duration">
                                                    @error('duration')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

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