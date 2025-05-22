<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterBookmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'header_id',
        'chapter_id',
        'student_id',
    ];

    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }

    public function chapter()
    {
        return $this->belongsTo('App\Models\Chapters', 'chapter_id', 'id');
    }

}
