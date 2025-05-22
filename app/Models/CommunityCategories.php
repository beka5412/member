<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'name',
        'slug'
    ];

    public function spaces()
    {
        return $this->hasMany('App\Models\CommunitySpaces', 'category_id', 'id');
    }
}
