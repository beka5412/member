<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\ChapterActivity;
use App\Models\PurchasedCourse;

class Student extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'taxpayer',
        'status',
        'password',
        'store_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function hasActiveCourse() {
        return PurchasedCourse::where('student_id', $this->id)->where('payment_status', '!=', 'cancelled')->exists();
    }

    public function hasAllCoursesAccess() {
        return PurchasedCourse::where('student_id', $this->id)->where('payment_type', 'lifetime')->where('start_date', '<=', now())->where('expires_at', '>=', now())->exists();
    }

    public function course_wl()
    {
        return $this->belongsToMany(
            'App\Models\Course', 'wishlists', 'student_id', 'course_id'
        );
    }

    public function course_purchased()
    {
        return $this->belongsToMany(
            'App\Models\Course', 'purchased_courses', 'student_id', 'course_id'
        );
    }

    public function purchasedCourse()
    {
        return $this->hasMany('App\Models\PurchasedCourse', 'student_id', 'id')->get()->pluck('course_id')->toArray();
    }

    public function purchasedCourses()
    {
        return $this->hasMany('App\Models\PurchasedCourse', 'student_id', 'id');
    }

    public function chapterComments()
    {
        return $this->hasMany('App\Models\ChapterComment');
    }

    public function store()
    {
        return $this->hasOne('App\Models\Store', 'id', 'store_id');
    }
}
