<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
{
    $countstudent = User::where("status", true)->count();
    $countadmission = User::where("status", false)->count();
    $countpayment = Payment::count();
    $countuser = User::count();
    $countadmin = User::where("is_admin", 1)->count();
    $countcourse = Course::count();
    $countcategory = Category::count();
    return view("admin.dashboard", compact("countstudent", "countadmission", "countuser", "countadmin", "countcourse", "countcategory", "countpayment"));
}
   public function manageadmission(){
    $addmissions = User::where("status", 0)
                       ->where("is_admin", 0)
                       ->get();
    return view("admin.manageadmission", compact("addmissions"));
}
  public function managestudent(){
    $students = User::where("status", 1)
                       ->where("is_admin", 0)
                       ->get();
    return view("admin.managestudent", compact("students"));
}
public function studentApprove($id){
    User::find($id)->update([
        "status" => 1
    ]);
    return redirect()->route("admin.managestudent")->with("toast_success", "Student Approved Successfully");
}

}
