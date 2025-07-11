@extends('landing.publiclayout')

@section('title', 'Course Details')

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
            <div class="container mt-4">
                <div class="row">

                    <div class="col-md-12 d-flex justify-content-end">
                        <a href="{{ route('student.myCourses') }}" class="btn btn-secondary mb-3"><i class="fa-solid fa-backward"></i> Back to My Courses</a>


                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="row g-0">
                                    @if ($course->image)
                                    <div class="col-md-4">
                                        <img src="{{ asset('storage/' . $course->image) }}" class="img-fluid rounded-start" alt="{{ $course->title }}">
                                    </div>
                                    @endif
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h3 class="card-title">{{ $course->title }}</h3>
                                            <p class="card-text">{{ $course->description }}</p>
                                        </div>
                                        @if($course->author)
                                        <p class="card-text"><strong><i class="fa-solid fa-user-tie"></i> Teacher:</strong>{{  $course->author  }}</p>
                                        @endif
                                        <p class="card-text"><strong><i class="fa-solid fa-calendar-alt"></i> Duration:</strong> {{ $course->duration }} {{ $course->duration == 1 ? 'week' : 'weeks' }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('students.script')
@endsection