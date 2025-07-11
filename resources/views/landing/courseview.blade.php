@extends("landing.publiclayout")
@section("title", "Course View")
@section("content")
<!-- Course View Section -->
<section class="course-view-section ">
    <div class="container">
        <!-- Course Header -->
        <div class="course-header  text-center" data-aos="fade-down">
            <div class="discount-badge">
                {{ round((($course->fees - $course->discount_price) / $course->fees) * 100) }}% OFF
            </div>
            <h1>{{ $course->title }}</h1>
            <p class="author">By {{ $course->author }}</p>
        </div>

        <!-- Course Image in Card -->
        <div class="row">
            <div class="col-md-6">
                <div class="course-image-card mt-2" data-aos="fade-up">
                    <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}">
                </div>
            </div>
            <div class="col-md-6">
                <!-- Course Details in Card -->
                <div class="course-details-card mt-2" data-aos="fade-up" data-aos-delay="100">
                    <h2>About This Course</h2>
                    <p>{{ $course->description }}</p>
                    <div class="price-section">
                        <span class="discounted-price">₹{{ number_format($course->discount_price, 2) }}</span>
                        <span class="original-price">₹{{ number_format($course->fees, 2) }}</span>
                    </div>
                    <div class="duration">
                        <i class="fas fa-clock me-2"></i> Duration: {{ $course->duration }} {{ $course->duration == 1 ? 'week' : 'weeks' }}


                    </div>
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if(Auth::check())
                    <form action="{{ route('course.enroll') }}" method="POST" id="payment-form">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                        <button type="button" id="rzp-button" class="btn btn-primary enroll-btn">Enroll Now</button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary enroll-btn">Enroll Now</a>
                    @endif

                </div>
            </div>
        </div>





        <!-- Related Courses (Dynamic Data) -->
        @if($relatedcourses->count() )
        <div class="related-courses" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-center">Explore More Courses by {{ $course->author }}</h2>
            <div class="row">
                @foreach($relatedcourses as $related)
                <div class="col-md-4 mb-4">
                    <div class="related-card">
                        <div class="card  shadow-sm">
                            <img src="{{ asset('storage/' . $related->image) }}" class="card-img-top" alt="Web Development">
                            <div class="card-body">
                                <h5 class="card-title">{{ $related->title }}</h5>
                                <p class="teacher">{{ $related->author }}</p>
                                <a href="{{ route('public.viewcourse', $related->id) }}" class="btn btn-primary enroll-btn">Enroll Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        @endif
    </div>
</section>

@endsection
@section('js')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": "{{ $razorpayKey }}",
        "amount": "{{ $amount }}",
        "currency": "INR",
        "name": "{{ env('APP_NAME') }}",
        "description": "Enroll for {{ $course->title }}",
        "handler": function(response) {
            // ✅ Razorpay ID set karo
            document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;

            // ✅ Form submit karo
            document.getElementById('payment-form').submit();
        },
        "theme": {
            "color": "#F37254"
        }
    };

    var rzp = new Razorpay(options);

    document.getElementById('rzp-button').onclick = function(e) {
        e.preventDefault();
        rzp.open();
    };
</script>



@endsection