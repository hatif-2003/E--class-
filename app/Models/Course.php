<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable =[
        'title',
        'author',
        'category_id',
        'fees',
        'discount_price',
        'description',
        'duration',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
 public function users()
{
    return $this->belongsToMany(User::class, 'student_courses');
}

}
