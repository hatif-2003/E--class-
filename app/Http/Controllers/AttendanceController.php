<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
     public function index()
     {
        $courses = Course::all();
        return view('admin.attandance', compact('courses'));
     }

     public function store(Request $request)
     {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'date' => 'required|date',
            'status' => 'required|in:present,absent',
        ]);

        foreach ($request->attandance as $studentId => $status)
        {
            Attendance::updateOrCreate([
                'user_id' => $studentId,
                'course_id' => $request->course_id,
                'date' => $request->date,
            ], [
                'status' => $status,
            ]);

        }
          return back()->with('success', 'Attendance recorded successfully.');
     }

     
}
