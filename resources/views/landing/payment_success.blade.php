<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <!-- Payment Success Section -->
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card shadow rounded p-4">
                    <h2 class="text-success">🎉 Payment Successful!</h2>
                    <p class="text-lead">Thank You For Enrolling in <strong>{{ $course->title }}</strong>.</p>
                    <hr>
                    <h4>🧾 Invoice</h4>
                    <ul>
                        <li><strong>Payment ID:</strong> {{ $payment->razorpay_payment_id }}</li>
                        <li><strong>Amount Paid:</strong> ₹{{ number_format($payment->amount, 2) }}</li>
                        <li><strong>Payment Method:</strong> {{ $payment->payment_method }}</li>
                        <li><strong>Date:</strong> {{ $payment->paid_at->format('d M Y, h:i A') }}</li>
                    </ul>
                    <hr>
                    <a href="{{ route('invoice.download', $payment->razorpay_payment_id) }}"
                        class="btn btn-success mt-3"
                        target="_blank">
                        📥 Download Invoice PDF
                    </a>
                    <hr>

                    <a href="{{ route('student.dashboard') }}" class="btn btn-primary mt-3">Go to Dashboard</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>