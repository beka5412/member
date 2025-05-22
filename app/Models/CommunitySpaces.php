<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunitySpaces extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'category_id',
        'title',
        'icon',
        'slug'
    ];

    public function posts(){
        return $this->hasMany(CommunityPosts::class, 'space_id', 'id');
    }
}
