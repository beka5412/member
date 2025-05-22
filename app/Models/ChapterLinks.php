<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterLinks extends Model
{
    protected $fillable = [
        'chapter_id',
        'chapter_label',
        'chapter_link'
    ];
}
