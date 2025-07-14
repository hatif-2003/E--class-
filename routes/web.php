<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::controller(PublicController::class)->group(function () {
  Route::get('/', "home")->name("public.home");
   Route::get('/course/{id}', "viewcourse")->name("public.viewcourse");
  Route::match(["get", "post"], '/apply', "apply")->name("public.apply");
  Route::match(["get", "post"], '/student/login', "login")->name("login");
  Route::get('/logout', "studentlogout")->name("public.logout");
  Route::get('/about', "about")->name("public.about");
});
 Route::post('/course/enroll', [PaymentController::class, 'enroll'])->name('course.enroll');
 Route::get('/invoice/download/{paymentId}', [PaymentController::class, 'downloadInvoice'])->name('invoice.download');


Route::middleware("auth")->group(function () {
  Route::controller(StudentController::class)->group(function () {
    Route::prefix("student")->group(function () {
      Route::get('/', "dashboard")->name("student.dashboard");
      Route::get('/myCourses', "myCourses")->name("student.myCourses");
      Route::get('/myCourses/{id}', "courseDetails")->name("student.course-details");
      Route::get('/myPayments', "myPayments")->name("student.myPayments");
      Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile');
      Route::get('/student/setting', [StudentController::class, 'seeting'])->name('student.seeting');
      Route::post('/student/change-password', [StudentController::class, 'changePassword'])->name('student.change.password');

    

    });
    Route::controller(AdminController::class)->group(function () {
      Route::prefix("admin")->middleware(['auth', 'admin'])->group(function () {
        Route::get('/', "dashboard")->name("admin.dashboard");
        Route::get('/admission', "manageadmission")->name("admin.manageadmission");
        Route::get('/students', "managestudent")->name("admin.managestudent");
        Route::get('/admission/{id}/approve', "studentApprove")->name("admin.studentApprove");
        Route::resource("categories", CategoryController::class)->except("show");
          Route::resource("courses", CourseController::class);
          Route::get('/payment', [PaymentController::class, 'showPayment'])->name('admin.payment');
          Route::get('/attendances', [AttendanceController::class, 'index'])->name('admin.attendance');
          Route::post('/attendances/store', [AttendanceController::class, 'store'])->name('admin.attendance.store');
      });

     
      

    });
  });
  Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
