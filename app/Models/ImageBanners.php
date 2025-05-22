<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageBanners extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'store_id',
        'type',
        'logo',
        'description',
        'link',
        'image',
        'video'
    ];
}
