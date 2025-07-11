@extends('landing.publiclayout')

@section('title', 'Dashboard')

@section('content')


<div class="container py-4">
    <!-- Profile Banner -->
    <div class="row">
        <div class="col-12">
            <div class="profile-banner">
                <div class="profile-content">
                    <div class="left">
                        <img
                            src="{{ Auth::check() && Auth::user()->image && file_exists(storage_path('app/public/' . Auth::user()->image)) ? asset('storage/' . Auth::user()->image) : asset('storage/default/default-user.jpg') }}"
                            class="rounded-circle"
                            width="80"
                            height="80"
                            alt="Profile"
                            loading="lazy"
                            onerror="this.onerror=null; this.src='https://www.gravatar.com/avatar/00000000000000000000000000000000?s=80&d=mp'">
                        <div>
                            <h4>Welcome {{ Auth::user()->name ?? 'Guest' }}</h4>
                            <p>{{ Auth::user()->email ?? 'guest@example.com' }}</p>
                        </div>
                    </div>
                    <a href="{{ route('student.myCourses') }}" class="btn btn-primary">My Courses</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar and Main Content -->
    <div class="row mt-3">
        <!-- Sidebar -->
        <div class="col-md-3">
            @include('students.sidebar')
          
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="main-content bg-white p-4 rounded shadow-sm">
                <h2 class="fw-semibold mb-3">Student Dashboard</h2>

                <!-- Example Section -->
                <div class="dashboard-section mb-4">
                    <h5 class="text-primary">My Courses</h5>
                    <p>List of all courses you are enrolled in will appear here.</p>
                </div>

                <div class="dashboard-section mb-4">
                    <h5 class="text-primary">Recent Payments</h5>
                    <p>Recent course payment history and receipts will be shown here.</p>
                </div>

                <div class="dashboard-section">
                    <h5 class="text-primary">Profile Info</h5>
                    <p>Update your name, email, and password here.</p>
                </div>
            </div>
        </div>
    </div>

</div>

@include('students.script')
@endsection