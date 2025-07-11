@extends("admin.adminlayout")
@section("title", "manage courses")
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
                        <h2 class="h4 m-0 text-dark fw-semibold">Manage Courses</h2>
                        <a href="{{ route("courses.create") }}" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-book-open"></i> Add More Course</a>
                    </div>
                    <div class="table-responsive">
                        <table class="student-table table  table-bordered table-hover align-middle">
                            <thead>
                                <tr>
                                    <th class="sortable">ID</th>
                                    <th class="sortable"> Title</th>
                                    <th class="sortable">Duration</th>
                                    <th class="sortable">Instuructor</th>
                                    <th class="sortable">Category</th>
                                    <th class="sortable">Fee</th>
                                    <th class="sortable">Description</th>
                                    <th class="sortable">Image</th>



                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course )

                                <tr>
                                    <td>{{ $course->id }}</td>
                                    <td>{{ $course->title }}</td>
                                    <td>  {{ $course->duration }}{{ $course->duration > 1 ? ' weeks' : ' week' }}</td>
                                    <td>{{ $course->author }}</td>
                                    <td>{{ $course->category->cat_title ?? 'No Category' }}</td>
                                    <td><span>₹{{ $course->discount_price }}</span> <del>₹{{ $course->fees }}</del></td>
                                    <td>{{ Str::limit($course->description, 20) }}</td>
                                    <td> <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="course-image" style="width: 80px; height: auto;"></td>

                                    <td class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route("courses.edit", $course) }}" class="action-btn edit me-1" title="Edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{ route("courses.destroy", $course) }}" method="POST" class="m-0 p-0">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="action-btn delete" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
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
</div>
@include('admin.script')
@endsection