<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchasedCourse extends Model
{
    protected $table = 'purchased_courses';

    protected $fillable = [
        'student_id',
        'course_id',
        'order_id',
        'product_id',
        'payment_status',
        'payment_type',
        'start_date',
        'expires_at'
    ];

    public function course()
    {
        return $this->hasOne('App\Models\Course', 'id', 'course_id');
    }
    
}
