<?php

namespace App\Models;
use App\Models\Course;
use App\Models\Chapters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id',
        'chapter_id',
        'header_id',
        'image',
        'description',
        'current_time',
        'store_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapters::class);
    }
}
