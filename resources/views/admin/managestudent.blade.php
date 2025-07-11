@extends("admin.adminlayout")
@section("title", "manage students")
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
            <h2 class="h4 m-0 text-dark fw-semibold">Manage Students</h2>
            
          </div>
          <div class="table-responsive">
            <table class="student-table table">
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
                @foreach ($students as $std )

                <tr>
                  <td>{{ $std->id }}</td>
                  <td>{{ $std->name }}</td>
                  <td>{{ $std->email }}</td>
                  <td>{{ $std->contact }}</td>
                  <td>{{ $std->education }}</td>
                  <td class="d-flex justify-content-center align-items-center gap-2">
                    <a href="" class="action-btn edit" title="Edit"><i class="fa-solid fa-eye"></i>
                    <a href="#" class="action-btn delete" title="Delete"><i class="fa-solid fa-eye-slash"></i></a>
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