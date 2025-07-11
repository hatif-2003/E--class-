<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard(){
         $user = Auth::user();
        $courses = $user->courses;
         $payments = $user->payments;
        return view("students.dashboard", compact('user', 'courses', 'payments'));
    }
    public function myCourses(){
        $user = Auth::user();
        $courses = $user->courses;
        return view("students.my-course", compact('user', 'courses'));

    }
    public function courseDetails($id){
       $user = Auth::user();
       $course = $user->courses()->where('courses.id', $id)->find($id);
         if (!$course) {
              return redirect()->back()->with('error', 'Course not found');
         }
            return view('students.course-details', compact('user', 'course'));

    }
    public function myPayments(){
        $payments = Payment::where('user_id', Auth::id())->with('course')->latest()->get();
        return view('students.my-payments', compact('payments'));

    }
    public function profile(){
        $user = Auth::user();
        return view('students.profile', compact('user'));
    }
    public function seeting(){
        $user = Auth::user();
        return view('students.seeting', compact('user'));
    }
    public function changePassword(Request $request){
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);
        $user = Auth::user();
        if (!password_verify($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect');
        }
        $user->password = bcrypt($request->new_password);
        $user->save();
        return redirect()->back()->with('success', 'Password changed successfully');
    }
}
