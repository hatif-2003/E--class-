@extends("landing.publiclayout")
@section('title')
Apply For Admission

@endsection

@section("content")

<div class="container mt-5">
    <div class="row">
        <!--  Advertisement Section -->
        <div class="col-md-7 mb-4 mb-md-0">
            <div class="p-4 bg-gradient text-white rounded shadow" style="background: linear-gradient(135deg, #4a90e2, #50e3c2); height: 100%;">
                <h2 class="fw-bold text-dark text-center mb-2">Join <span class="text-primary">{{ env('APP_NAME') }}</span> Today!</h2>
                <p class="lead fw-semibold text-center mb-3" style="font-size: 1rem; color: #FCBD34;">
                    "Your journey to success begins with the right guidance."
                </p>
                <img src="https://img.freepik.com/free-vector/online-test-concept-illustration_114360-4797.jpg?size=626&ext=jpg"
                    class="img-fluid rounded shadow d-block mx-auto" style="max-height: 280px; object-fit: cover;" alt="Coaching Image">
            </div>
        </div>



        <!--  Form Section -->
        <div class="col-md-5">
            <div class="card border-0 shadow-lg">
                <div class="card-header text-center h5 bg-primary text-white fw-bold">Apply For Joining Our {{ env("APP_NAME") }}</div>
                <div class="card-body bg-light">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Oops! Kuch galat hai:</strong>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Contact</label>
                                    <input type="number" name="contact" class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact') }}">
                                    @error('contact')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Education</label>
                                    <input type="text" name="education" class="form-control @error('education') is-invalid @enderror" value="{{ old('education') }}">
                                    @error('education')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary fw-bold">Apply Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection