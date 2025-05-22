<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntegrationProduct extends Model
{
    use HasFactory;

    protected $casts = [
        'courses' => 'array',
    ];

    protected $fillable = [
        'integration_id',
        'name',
        'platform_product_id',
        'courses'
    ];
}
