@extends("landing.publiclayout")

@section("content")
<x-banner />
<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <div class="text-center">
            <h2 data-aos="fade-up">Why Choose Our Coaching Platform?</h2>
            <p class="subtitle" data-aos="fade-up" data-aos-delay="100">
                Empower your learning journey with cutting-edge features designed for success.
            </p>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="0">
                <div class="feature-box">
                    <i class="fas fa-globe icon"></i>
                    <h4>Learn Anywhere</h4>
                    <p>Access our courses anytime, anywhere, on any device with seamless flexibility.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="150">
                <div class="feature-box">
                    <i class="fas fa-chalkboard-teacher icon"></i>
                    <h4>Expert Instructors</h4>
                    <p>Learn from industry experts and experienced tutors dedicated to your growth.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-box">
                    <i class="fas fa-certificate icon"></i>
                    <h4>Get Certified</h4>
                    <p>Earn recognized certifications upon completing your courses to boost your career.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="course-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h2 data-aos="fade-up">Explore Our Courses</h2>
                    <p class="c-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Discover a wide range of courses tailored to your learning needs.
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach ($courses as $course )
                
               

                <div class="course-card " data-aos="fade-up" data-aos-delay="300" >
                    <div class="card shadow-sm">
                        <!-- Discount Badge -->
                        <div class="discount-badge">
                           {{ round((($course->fees - $course->discount_price) / $course->fees) * 100) }} % OFF
                        </div>
                        <div class="card-img-wrapper">
                            <img src="{{ asset("storage/". $course->image ) }}" class="card-img-top" alt="Python Course">
                            <div class="img-overlay"></div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{  $course->title }}</h5>
                            <p class="card-text teacher">{{ $course->author }}</p>
                            <p class="card-text text-truncate">{{ $course->description }}</p>
                            <div class="price-section">
                                <span class="discounted-price">₹{{ $course->discount_price }}</span>
                                <span class="original-price text-muted text-decoration-line-through">₹{{ $course->fees }}</span>
                            </div>
                            <a href="{{ route("public.viewcourse", $course->id) }}" class="btn btn-primary enroll-btn">Enroll Now</a>
                        </div>
                    </div>
                </div>
                 @endforeach
            </div>
        </div>
    </div>


</section>

@endsection