<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntegrationPlatform extends Model
{
    use HasFactory;

    protected $fillable = [
        'enabled',
        'company',
        'name',
        'description',
        'logo_url',
        'slug'
    ];
}
