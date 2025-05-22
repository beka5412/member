<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integration extends Model
{
    use HasFactory;

    public function platform()
    {
        return $this->belongsTo('App\Models\IntegrationPlatform', 'integration_platform_id');
    }
}
