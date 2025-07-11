<div>
  <section class="py-5 bg-light text-center text-md-start">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h1 class="display-5 fw-bold mb-3">Unlock Your Potential with <span class="text-primary">{{ env('APP_NAME') }}</span></h1>
          <p class="lead text-muted">"Education is not the filling of a pail, but the lighting of a fire. Let your journey to success begin here."</p>
          @guest
          <a href="{{ route("public.apply") }}" class="btn btn-primary btn-lg mt-3">Apply Now</a>

          @endguest
        </div>
        <div class="col-md-6 d-none d-md-block">
          <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?auto=format&fit=crop&w=800&q=80" class="img-fluid rounded shadow" alt="Coaching Banner">
        </div>
      </div>
    </div>
  </section>



</div>