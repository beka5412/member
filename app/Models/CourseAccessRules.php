<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAccessRules extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'type',
        'value',
        'course_progress_id'
    ];
}
