<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function home()

    {
        $courses = Course::where("status", true)->get();

        return view("landing.homepage", compact("courses"));
    }
    public function viewcourse($id)
    {
        $course = Course::find($id);
        $razorpayKey = env('RAZORPAY_KEY'); // ✅ Razorpay key fetch karo .env se
        $amount = $course->discount_price * 100;
        //retated course by same teacher
        $relatedcourses = Course::where("author", $course->author)->where("id", '!=', $course->id)->take(3)->get();
        return view("landing.courseview", compact("course", "razorpayKey", "amount", "relatedcourses"));
    }

    public function apply(Request $req)
    {
        if ($req->isMethod("post")) {
            $data = $req->validate([
                'name' => ['required', 'regex:/^[A-Za-z]+(?:\s[A-Za-z]+)?$/'], // one or two words
                'email' => 'required|email|unique:users,email',
                'contact' => [
                    'required',
                    'regex:/^[6-9][0-9]{9}$/',
                    'unique:users,contact'
                ],
                'education' => 'required|string|min:3|max:100',

                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'password' => 'required|string|min:9|max:9',

            ]);
            // Image upload logic
            $imagePath = null;
            if ($req->hasFile('image')) {
                $image = $req->file('image');
                $imagePath = $image->store('images', 'public');
            }
            //all work
            User::create([
                'name' => $req->name,
                'email' => $req->email,

                'contact' => $req->contact,
                'image' => $imagePath,
                'education' => $req->education,
                'password' => $req->password
            ]);


            return redirect()->route("login")->with('toast_success', 'Your application has been submitted successfully!');
        }
        return view("landing.apply");
    }
    public function login(Request $req)
    {
        if ($req->isMethod("post")) {
            $data = $req->validate([
                'email' => 'required|email|',
                'password' => 'required|string|',

            ]);
            if (Auth::attempt($data)) {
                if ((int)Auth::user()->is_admin === 1) {
                    return redirect()->route("admin.dashboard");
                }


                return redirect()->route("student.dashboard");
            } else {
                return redirect()->back()->with('msg', "invalid Credenteles");
            }
        }
        return view("landing.login");
    }
    public function studentlogout()
    {
        Auth::logout();
        return redirect()->route("public.home");
    }
    public function about(){
        return view("landing.about");
    }
}
