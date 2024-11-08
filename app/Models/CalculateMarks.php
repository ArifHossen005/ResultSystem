<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculateMarks extends Model
{
    use HasFactory;
     protected $fillable = ['student_id', 'course_id', 'marks', 'result_id'];


     public function course()
     {
        return $this->hasMany(Course::class, 'id', 'course_id');
     }

     
}
