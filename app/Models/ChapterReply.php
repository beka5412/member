<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'user_id',
        'comment',
    ];

    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
