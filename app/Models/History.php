<?php

namespace App\Models;

use App\Traits\PropertiesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory, PropertiesTrait;

    protected $fillable = [
        'name',
        'description',
        'event_date_at',
        'active'
    ];

    protected $casts = [
        'event_date_at' => 'datetime',
        'active'        => 'boolean'
    ];
}
