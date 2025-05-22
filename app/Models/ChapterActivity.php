<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'course_id',
        'chapter_id',
        'student_id',
        'type',
        'current_time',
        'total_time'
    ];
}
