<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterCommentLikes extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id',
        'reply_id',
        'user_id',
        'like',
        'dislike'
    ];
}
