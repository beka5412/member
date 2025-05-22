<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterRatting extends Model
{
    protected $fillable = [
        'chapter_id',
        'student_id',
        'ratting',
        'review'
    ];
}
