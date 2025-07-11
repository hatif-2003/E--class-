@extends('landing.publiclayout')

@section('title', 'my-payments')

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
            <div class="container mt-3">
                <h3 class="mb-4">My Payment History</h3>
                @if ($payments->count())
                <div class="table-responsive">
                    <table class="student-table table  table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th>#</th>

                                <th>Course Name</th>
                                <th>Amount</th>
                                <th>Payment ID</th>
                                <th>Status</th>
                                <th>Paid At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $index => $payment)

                            <tr>
                                <td>{{ $index + 1 }}</td>

                                <td>{{ $payment->course->title }}</td>
                                <td>₹{{ number_format($payment->amount, 2) }}</td>
                                <td>{{ $payment->razorpay_payment_id }}</td>
                                <td>
                                    @if($payment->status == 'captured')
                                    <span class="badge bg-success">Successful</span>
                                    @else
                                    <span class="badge bg-danger">{{ ucfirst($payment->status) }}</span>
                                    @endif
                                </td>
                                <td>{{ $payment->paid_at->format('d M Y h:i A') }}</td>

                            </tr>

                            @endforeach



                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-info">
                        You haven't made any payments yet.
                    </div>
                           @endif

                </div>



         
            </div>

        </div>
    </div>
</div>
@include('students.script')
@endsection