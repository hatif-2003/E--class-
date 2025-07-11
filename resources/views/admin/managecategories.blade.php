@extends("admin.adminlayout")
@section("title", "manage category")
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
                        <h2 class="h4 m-0 text-dark fw-semibold">Manage Category</h2>
                        <a href="{{ route("categories.create") }}" class="btn btn-sm btn-primary">
                          <i class="fa-solid fa-list"></i> Add More Category</a>
                    </div>
                    <div class="table-responsive">
                        <table class="student-table table  table-bordered table-hover align-middle">
                            <thead>
                                <tr>
                                    <th class="sortable">ID</th>
                                    <th class="sortable">Category Title</th>
                                    <th class="sortable">Category Description</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $cat )

                                <tr>
                                    <td>{{ $cat->id }}</td>
                                    <td>{{ $cat->cat_title }}</td>
                                    <td>{{ $cat->cat_description }}</td>

                                    <td class="d-flex align-items-center">
                                        <a href="{{ route("categories.edit", $cat) }}" class="action-btn edit me-1" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{ route('categories.destroy', $cat) }}" method="POST" class="m-0 p-0">
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