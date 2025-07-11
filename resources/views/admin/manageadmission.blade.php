@extends("admin.adminlayout")
@section("title", "manage admission")
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
            <h2 class="h4 m-0 text-dark fw-semibold">Manage Admission</h2>
            <a href="#" class="btn btn-sm btn-primary"><i class="fa-solid fa-user-plus me-2"></i>Add More Students</a>
          </div>
          <div class="table-responsive">
            <table class="student-table table  table-bordered table-hover align-middle">
              <thead>
                <tr>
                  <th class="sortable">ID</th>
                  <th class="sortable">Name</th>
                  <th class="sortable">Email</th>
                  <th class="sortable">Contact</th>
                  <th class="sortable">Education</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($addmissions as $ad )

                <tr>
                  <td>{{ $ad->id }}</td>
                  <td>{{ $ad->name }}</td>
                  <td>{{ $ad->email }}</td>
                  <td>{{ $ad->contact }}</td>
                  <td>{{ $ad->education }}</td>
                  <td>
                    <a href="{{ route("admin.studentApprove", $ad->id) }}" class="action-btn edit" title="Edit"><i class="fa-solid fa-square-check"></i></a>
                    <a href="#" class="action-btn delete" title="Delete"><i class="fas fa-trash"></i></a>
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