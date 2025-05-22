<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterCommentSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'approval_required',
    ];
}
