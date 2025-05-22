<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityPosts extends Model
{
    use HasFactory;

    protected $fillable = [
        'space_id',
        'user_id',
        'store_id',
        'title',
        'description',
        'author',
        'pinned',
    ];

    public function media()
    {
        return $this->hasMany('App\Models\CommunityMedia', 'post_id', 'id');
    }

    public function student()
    {
        return $this->hasOne('App\Models\Student', 'id', 'author');
    }
}
