@extends("landing.publiclayout")
@section('title')
Student Login
@endsection

@section("content")

<div class="container mt-5">
    <div class="row">
        <!-- Left Advertisement Section -->
        <div class="col-md-7 mb-4 mb-md-0">
            <div class="p-4 bg-gradient text-white rounded shadow" style="background: linear-gradient(135deg, #4a90e2, #50e3c2); height: 100%;">
                <h2 class="fw-bold text-dark text-center mb-2">Welcome Back to <span class="text-primary">{{ env('APP_NAME') }}</span>!</h2>
                <p class="lead fw-semibold text-center mb-3" style="font-size: 1rem; color: #FCBD34;">
                    "Log in to continue your learning journey with us."
                </p>
                <img src="https://img.freepik.com/free-vector/login-concept-illustration_114360-739.jpg?size=626&ext=jpg"
                    class="img-fluid rounded shadow d-block mx-auto" style="max-height: 280px; object-fit: cover;" alt="Login Image">
            </div>
        </div>

        <!-- Right Login Form Section -->
        <div class="col-md-5">
            <div class="card border-0 shadow-lg">
                <div class="card-header text-center h5 bg-primary text-white fw-bold">Student Login</div>
                <div class="card-body bg-light">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <form action="{{ route("login") }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary fw-bold">Login</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <a href="#" class="text-decoration-none">Forgot Password?</a><br>
                        <a href="{{ route('public.apply') }}" class="text-decoration-none">Don't have an account? Apply Now</a>
                        <a href="{{ url('auth/redirect/google') }}" class="btn btn-outline-primary mt-3">
                            <i class="fab fa-google"></i> Continue with Google
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection