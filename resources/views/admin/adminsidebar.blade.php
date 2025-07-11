<aside class="sidebar">
    <div class="sidebar-header">
        <span><i class="fas fa-graduation-cap me-2"></i></span>
        <h3 class="fw-semibold">{{ env("APP_NAME") }}</h3>
    </div>
    <nav class="sidebar-menu">
        <a href="{{ route("admin.dashboard") }}" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="#" class="dropdown-toggle"><i class="fas fa-users"></i> Students <i class="fas fa-chevron-down"></i></a>
        <div class="dropdown-menu">
            <a href="#">Add Student</a>
            <a href="{{ route("admin.manageadmission") }}">Manage Admission</a>
             <a href="{{ route("admin.managestudent") }}">Manage Students</a>
            <a href="#">Attendance</a>
        </div>
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-book"></i> Courses <i class="fas fa-chevron-down"></i></a>
        <div class="dropdown-menu">
             <a href="{{ route("courses.create") }}">Add Courses</a>
             <a href="{{ route("courses.index") }}">Manage Courses</a>
            <a href="{{ route("categories.create") }}">Add Categories</a>
            <a href="{{ route("categories.index") }}">Manage Categories</a>
           
        </div>
        <a href="#"><i class="fas fa-chalkboard-teacher"></i> Teachers</a>
        <a href="{{ route('admin.payment') }}"><i class="fas fa-money-bill-wave"></i> Payments</a>
        <a href="#"><i class="fas fa-calendar-alt"></i> Schedule</a>
        <a href="#"><i class="fas fa-cog"></i> Settings</a>
        <a href="{{ route('public.logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>

    </nav>
</aside>
<!-- Toggle Button for Mobile -->
<button class="sidebar-toggle"><i class="fas fa-bars"></i></button>