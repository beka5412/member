<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseThemeSettings extends Model
{
    protected $fillable = [
        'name',
        'value',
        'course_id',
        'store_id',
    ];
}
