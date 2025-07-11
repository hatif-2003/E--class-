@extends('landing.publiclayout')

@section('title', 'My Courses')

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
                    <button class="btn btn-primary">My Courses</button>
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
            <h2 class="mb-4 text-primary"><i class="fa-solid fa-book text-primary"></i> My Courses</h2>
            @if($courses->count())
            <div class="row">
                @foreach ($courses as $course)
                <div class="col-md-4">
                    <div class="card shadow-sm mb-4">
                        @if($course->image)
                        <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top" alt="{{ $course->title }}">

                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text ">{{ Str::limit($course->description, 100) }}</p>
                            {{-- Teacher name (if relation exists) --}}
                            @if($course->author)
                            <p class="card-text"><strong>Instructor:</strong> {{ $course->author }}</p>
                            @endif
                            <a href="{{ route('student.course-details', $course->id) }}" class="btn btn-primary btn-sm">View Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="alert alert-info">You have not enrolled in any course yet.</div>
            @endif
        </div>
    </div>
</div>
@include('students.script')
@endsection