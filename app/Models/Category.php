<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'store_id',
        'name',
        'category_image',
        'status',
        'position',
        'created_by',
    ];

    public function courses()
    {
        return $this->hasMany('App\Models\Course', 'category');
    }
}
