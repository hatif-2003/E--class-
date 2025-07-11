<aside class="sidebar bg-light p-3 rounded shadow-sm">
            <!-- Sidebar Header -->
            <div class="sidebar-header mb-4 text-center">
                <span><i class="fas fa-user-graduate me-2"></i></span>
                <h4 class="fw-bold">{{ Auth::user()->name }}</h4>
            </div>

            <!-- Sidebar Menu -->
            <nav class="sidebar-menu d-flex flex-column gap-2">
                <a href="{{ route('student.dashboard') }}" class="active">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="{{ route('student.myCourses') }}">
                    <i class="fas fa-book-open"></i> My Courses
                </a>
                <a href="{{ route('student.myPayments') }}">
                    <i class="fas fa-credit-card"></i>My Payments
                </a>
                <a href="{{ route('student.profile') }}">
                    <i class="fas fa-user-cog"></i> Profile
                </a>
                <a href="{{ route('student.seeting') }}">
                  <i class="fa-solid fa-gear"></i> Seeting
                </a>
                <a href="{{ route('public.logout') }}">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </nav>
        </aside>
          <!-- Toggle Button for Mobile -->
            <button class="sidebar-toggle"><i class="fas fa-bars"></i></button>