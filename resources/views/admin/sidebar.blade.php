
    <aside class="sidebar">
        <!-- Sidebar Header -->
        <div class="sidebar-header">
            <span><i class="fas fa-graduation-cap me-2"></i></span>
            <h3 class="fw-semibold">{{ env("APP_NAME") }}</h3>
        </div>

        <!-- Sidebar Menu -->
        <nav class="sidebar-menu">
            <a href="#" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-users"></i> Students <i class="fas fa-chevron-down"></i></a>
            <div class="dropdown-menu">
                <a href="#">Add Student</a>
                <a href="{{ route("admin.manageadmission") }}">Manage Students</a>
                <a href="{{ route('admin.attendance') }}">Attendance</a>
            </div>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-book"></i> Courses <i class="fas fa-chevron-down"></i></a>
            <div class="dropdown-menu">
                <a href="#">Add Course</a>
                <a href="#">Manage Courses</a>
            </div>
            <a href="#"><i class="fas fa-chalkboard-teacher"></i> Teachers</a>
            <a href="#"><i class="fas fa-money-bill-wave"></i> Payments</a>
            <a href="#"><i class="fas fa-calendar-alt"></i> Schedule</a>
            <a href="#"><i class="fas fa-cog"></i> Settings</a>
            <a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </aside>

    <!-- Toggle Button for Mobile -->
    <button class="sidebar-toggle"><i class="fas fa-bars"></i></button>
</div>