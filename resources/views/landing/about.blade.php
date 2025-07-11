@extends('landing.publiclayout')
@section('title', 'abbou us')
@section('content')

  <div class="container py-5" style=" background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;">
        <!-- About Section -->
        <div class="card mb-5 gradient-bg text-white shadow-lg card-hover animate-slide-in">
            <div class="card-body text-center p-5">
                <h2 class="card-title mb-4">About {{ env("APP_NAME") }}</h2>
                <p class="card-text">
                    {{ env("APP_NAME") }} is developed as a modern Coaching Management System using Laravel. It handles courses, students, payments, profiles, and more.
                </p>
            </div>
        </div>

        <!-- Team Section -->
        <div class="text-center">
            <h3 class="mb-5 animate-slide-in">Development Team</h3>
            <div class="row g-4">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="team-member p-4 bg-white shadow-sm animate-fade-in-up" style="--delay: 0.1">
                        <h4 class="fw-bold">Hatif</h4>
                        <small>Laravel Developer & Project Lead</small>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="team-member p-4 bg-white shadow-sm animate-fade-in-up" style="--delay: 0.2">
                        <h4 class="fw-bold">Muzamil Alam</h4>
                        <small>UI/UX Designer</small>
                    </div>
                </div>
              
                
            </div>
        </div>
    </div>


@endsection