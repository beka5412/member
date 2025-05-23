<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{

    use HasFactory;

    protected $fillable = [
        'store_id',
        'title',
        'type',
        'course_requirements',
        'course_description',
        'status',
        'free',
        'category',
        'quiz',
        'sub_category',
        'duration',
        'visible',
        'comments',
        'reviews',
        'gamification',
        'linear_progress',
        'skip_modules',
        'per_row',
        'link',
        'external_link',
        'thumbnail',
        'police',
        'created_by',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'id', 'category');
    }

    public function category_id()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category');
    }

    public function subcategory_id()
    {
        return $this->hasOne('App\Models\Subcategory', 'id', 'sub_category');
    }

    public function quiz_id()
    {
        return $this->hasOne('App\Models\QuizSettings', 'id', 'quiz');
    }

    public function header_id()
    {
        return $this->hasMany('App\Models\Header', 'course', 'id');
    }

    public function tutor_id()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }

    public function chapter_count()
    {
        return $this->hasMany('App\Models\Chapters', 'course_id', 'id');
    }

    public function course_rating()
    {
        $ratting    = Ratting::where('course_id', $this->id)->where('rating_view', 'on')->sum('ratting');
        $user_count = Ratting::where('course_id', $this->id)->where('rating_view', 'on')->count();
        if($user_count > 0)
        {
            $avg_rating = number_format($ratting / $user_count, 1);
        }
        else
        {
            $avg_rating = number_format($ratting / 1, 1);

        }

        return $avg_rating;
    }

    public function student_wl()
    {
        return $this->belongsToMany(
                'App\Models\Student', 'wishlists', 'course_id', 'student_id'
            )->where('student_id','=',\Auth::guard('students')->user()->id);
  
    }

    public function purchased_course()
    {
        return $this->belongsToMany(
            'App\Models\Student', 'purchased_courses', 'course_id', 'student_id'
        );
    }

    public function student_count()
    {
        return $this->hasMany('App\Models\PurchasedCourse', 'course_id', 'id');
    }

    public function course_access_rules()
    {
        return $this->hasOne('App\Models\CourseAccessRules', 'course_id', 'id');
    }

    public static function stores($store)
    {
        $categoryArr  = explode(',', $store);
        $unitRate = 0;
        foreach($categoryArr as $store)
        {
            if($store == 0){
                $unitRate = '';
            }
            else{
                $store     = Store::find($store);
                $unitRate  = $store->name;
            }
        }
        return $unitRate;
    }
    
}
