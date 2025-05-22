<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'course_id',
        'type',
        'logo',
        'description',
        'link',
        'image',
        'image_mobile',
        'video',
        'btn_bg',
        'btn_color'
    ];
}
