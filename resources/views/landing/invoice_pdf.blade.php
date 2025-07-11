<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - {{ $payment->razorpay_payment_id }}</title>
     <style>
        body {
          font-family: DejaVu Sans, "Arial Unicode MS", Arial, sans-serif;
            font-size: 14px;
            color: #333;
            margin: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            color: #4CAF50;
        }
        .invoice-details {
            margin-bottom: 30px;
        }
        .invoice-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-details th, .invoice-details td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        .invoice-details th {
            background-color: #f2f2f2;
            width: 30%;
        }
        .total {
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            text-align: right;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
     <div class="header">
        <h1>Invoice</h1>
        <p>Thank you for your payment!</p>
    </div>

    <div class="invoice-details">
        <table>
            <tr>
                <th>Invoice Number:</th>
                <td>{{ $payment->razorpay_payment_id }}</td>
            </tr>
            <tr>
                <th>Course Name:</th>
                <td>{{ $course->title }}</td>
            </tr>
            <tr>
                <th>Amount Paid:</th>
                <td>₹{{ number_format($payment->amount, 2) }}</td>
            </tr>
            <tr>
                <th>Payment Method:</th>
                <td>{{ ucfirst($payment->payment_method) }}</td>
            </tr>
            <tr>
                <th>Payment Date:</th>
                <td>{{ $payment->paid_at->format('d M Y, h:i A') }}</td>
            </tr>
        </table>
    </div>

    <div class="total">
        Total: ₹{{ number_format($payment->amount, 2) }}
    </div>

    <div class="footer">
        <p>{{ env('APP_NAME') }} &copy; {{ date('Y') }}</p>
    </div>

    
</body>
</html>



   


