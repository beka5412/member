<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapters extends Model
{
    protected $fillable = [
        'header_id',
        'course_id',
        'name',
        'order_by',
        'thumbnail',
        'type',
        'enable_time',
        'time_type',
        'time_number',
        'video_url',
        'text_content',
        'chapter_description',
        'position'
    ];

    public function header_data()
    {
        return $this->hasMany('App\Models\Header', 'id', 'header_id');
    }

    public function chapters_status()
    {
        return $this->hasOne('App\Models\ChapterStatus', 'chapter_id', 'id');
    }

}
