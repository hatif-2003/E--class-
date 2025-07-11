@extends("admin.adminlayout")
@section("title", "Admin Dashboard")
@section("content")
<div class="container-fluid mt-4 ">
  <!-- Profile Banner -->
  <div class="row">
    <div class="col-12">
      <div class="profile-banner">
        <div class="profile-content">
          <div class="left">
            <img
              src="{{ Auth::check() && Auth::user()->image && file_exists(storage_path('app/public/' . Auth::user()->image)) ? asset('storage/' . Auth::user()->image) : asset('storage/default/office.jpg') }}"
              class="rounded-circle"
              width="80"
              height="80"
              alt="Profile"
              loading="lazy"
              onerror="this.onerror=null; this.src='https://www.gravatar.com/avatar/00000000000000000000000000000000?s=80&d=mp'">
            <div>
              <h4>Welcome Admin {{ Auth::user()->name ?? 'Guest' }}</h4>
              <p>{{ Auth::user()->email ?? 'guest@example.com' }}</p>
            </div>
          </div>
          <button class="btn btn-primary">Add a Course</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Sidebar and Main Content -->
  <div class="row mt-3">
    <div class="col-md-3">
      @include('admin.adminsidebar')
    </div>
    <div class="col-md-9">
      <div class="main-content">
        <!-- Placeholder for main content -->
        <h2>Main Dashboard Content</h2>
        <p>This is where your dashboard content will go (e.g., charts, stats, tables).</p>

        <!-- Dashboard Cards -->
        <div class="row mt-4">
          <div class="col-md-4 mb-3">
            <div class="dashboard-card red">
              <div class="card-icon"><i class="fas fa-users"></i></div>
              <h2>{{ $countstudent }}</h2>
              <p>Students</p>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="dashboard-card yellow">
              <div class="card-icon"><i class="fas fa-book"></i></div>
              <h2>{{ $countcourse }}</h2>
              <p>Courses</p>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="dashboard-card blue">
              <div class="card-icon"><i class="fas fa-tags"></i></div>
              <h2>{{ $countcategory }}</h2>
              <p>Categories</p>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="dashboard-card green">
              <div class="card-icon"><i class="fas fa-database"></i></div>
              <h2>{{  $countadmission }}</h2>
              <p>Addmision</p>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="dashboard-card blue">
              <div class="card-icon"><i class="fa-brands fa-stack-exchange"></i></div>
              <h2>20</h2>
              <p>Batches</p>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="dashboard-card red">
              <div class="card-icon"><i class="fas fa-money-bill-wave"></i></div>
              <h2>{{ $countpayment }}</h2>
              <p>Payments</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript for Sidebar Toggle and Dropdown -->
@include('admin.script')
@endsection