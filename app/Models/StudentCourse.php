<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    public function courses()
{
    return $this->belongsToMany(Course::class, 'student_courses');
}

}
