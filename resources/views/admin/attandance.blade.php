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
                            <h2 class="h4 m-0 text-dark fw-semibold"> Students Attandence</h2>



                        </div>
                        <form method="GET" action="{{ route('admin.attendance') }}">
                            <label>Select Course:</label>
                            <select name="course_id" onchange="this.form.submit()">
                                <option value="">-- Select --</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>
                                        {{ $course->title }}
                                    </option>
                                @endforeach
                            </select>
                        </form>


                        @if(request('course_id'))
    @php
        $students = \App\Models\User::where('course_id', request('course_id'))->get();
    @endphp

    <form action="{{ route('admin.attendance.store') }}" method="POST">
        @csrf
        <input type="hidden" name="course_id" value="{{ request('course_id') }}">

        <label>Date:</label>
        <input type="date" name="date" required>

        <table class="table">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>
                            <select name="attendance[{{ $student->id }}]">
                                <option value="present">Present</option>
                                <option value="absent">Absent</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Save Attendance</button>
    </form>
@endif


                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('admin.script')
@endsection