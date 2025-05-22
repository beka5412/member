<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meetings extends Model
{
    use HasFactory;

    protected $fillable = [
        'platform',
        'title',
        'meeting_id',
        'media',
        'course_id', 
        'student_id',
        'start_date',
        'duration',
        'start_url',
        'password',
        'join_url',
        'status',
        'created_by',
    ];

    public function course()
    {
        return $this->hasOne('App\Models\Course', 'id', 'course_id');
    }
}
