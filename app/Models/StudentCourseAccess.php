<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourseAccess extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id',
        'unlocked_date',
        'is_unlocked'
    ];
}
