<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ChapterComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'chapter_id',
        'user_id',
        'comment',
        'approved',
        'spam',
        'store_id',
    ];

    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'user_id', 'id');
    }

    public function replies(){
        return $this->hasMany('App\Models\ChapterReply', 'parent_id', 'id');
    }

    public function store(){
        return $this->hasOne('App\Models\Store', 'id', 'store_id');
    }

    public function chapter(){
        return $this->hasOne('App\Models\Chapters', 'id', 'chapter_id');
    }
}
