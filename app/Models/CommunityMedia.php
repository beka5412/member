<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'media',
        'post_id',
        'type'
    ];
}
