<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'keys',
        'store_id',
    ];
}
