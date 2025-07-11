@extends("admin.adminlayout")
@section("title", "manage-payment")
@section("content")
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-3">
            @include('admin.adminsidebar')
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="student-table-container">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="h4 m-0 text-dark fw-semibold">Manage Payment</h2>


                        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-primary">Go Back</a>
                    </div>
                    <div class="mb-3">
                        <form method="GET" action="{{ route('admin.payment') }}" class="row g-2 mb-4 d-flex justify-content-between align-items-center">
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="Search by name or ID" value="{{ request('search') }}">
                            </div>
                            <div class="col-md-3">
                                <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
                            </div>
                            <div class="col-md-3">
                                <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100">Filter</button>
                            </div>
                        </form>


                    </div>

                    <div class="table-responsive">
                        <table class="student-table table  table-bordered table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Course</th>
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
                                    <td>{{ $payment->user->name }}</td>
                                    <td>{{ $payment->course->title }}</td>
                                    <td>₹{{ number_format($payment->amount, 2) }}</td>
                                    <td>{{ $payment->razorpay_payment_id }}</td>
                                    <td>{{ ucfirst($payment->status) }}</td>
                                    <td>{{ $payment->paid_at->format('d M Y h:i A') }}</td>

                                </tr>

                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@include('admin.script')
@endsection