<?php

namespace App\Http\Controllers;

use App\Models\Course;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use Barryvdh\DomPDF\Facade\Pdf;


class PaymentController extends Controller
{
    public function showPayment(Request $request){
       $search = $request->input('search');
    $fromDate = $request->input('from_date');
    $toDate = $request->input('to_date');

    $payments = Payment::with(['user', 'course'])
        ->when($search, function ($query, $search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })->orWhere('razorpay_payment_id', 'like', '%' . $search . '%');
        })
        ->when($fromDate, function ($query, $fromDate) {
            $query->whereDate('paid_at', '>=', $fromDate);
        })
        ->when($toDate, function ($query, $toDate) {
            $query->whereDate('paid_at', '<=', $toDate);
        })
        ->latest()
        ->get();

    return view('admin.manage-payment', compact('payments', 'search', 'fromDate', 'toDate'));
    }

  public function enroll(Request $request)
{
     if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please login first to enroll.');
    }

    // Step 1: Validate incoming request
    $request->validate([
        'razorpay_payment_id' => 'required|string',
        'course_id' => 'required|exists:courses,id',
    ]);

    try {
        // Step 2: Initialize Razorpay API
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        // Step 3: Fetch the payment using payment ID
        $payment = $api->payment->fetch($request->input('razorpay_payment_id'));

        // Step 4: Capture the payment
        if ($payment->capture(['amount' => $payment['amount']])) {

            // Step 5: Save payment in database
            $savedPayment = Payment::create([
                'user_id' => Auth::id(),
                'course_id' => $request->course_id,
                'razorpay_payment_id' => $payment->id,
                'amount' => $payment->amount / 100,
                'currency' => $payment->currency,
                'status' => $payment->status,
                'payment_method' => $payment->method ?? 'unknown',
                'paid_at' => now(),
            ]);

              // Step 6: Enroll user in the course (prevent duplicate enrollment)
            $user = Auth::user();
            if (!$user->courses->contains($request->course_id)) {
                $user->courses()->attach($request->course_id);
            }


            // Step 7: Fetch course details
            $course = Course::findOrFail($request->course_id);

            // Step 8: Show success view
            return view('landing.payment_success', [
                'course' => $course,
                'payment' => $savedPayment // 👈 better to pass saved DB object
            ]);
        } else {
            return redirect()->back()->with('error', 'Payment capture failed!');
        }

    } catch (\Exception $e) {
        // Catch and handle any Razorpay or API error
        return redirect()->back()->with('error', 'Payment processing error: ' . $e->getMessage());
    }
}
public function downloadInvoice($paymentId)
{
    $payment = Payment::where('razorpay_payment_id', $paymentId)->firstOrFail();
    $course = $payment->course;

    $pdf = Pdf::loadView('landing.invoice_pdf', compact('payment', 'course'));

    return $pdf->download('Invoice_'.$payment->razorpay_payment_id.'.pdf');
}


}
