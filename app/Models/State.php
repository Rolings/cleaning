<?php

namespace App\Models;

use App\Traits\PropertiesTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory, PropertiesTrait;

    protected $fillable = [
        'name',
        'abbreviation',
        'postal_abbreviation',
        'capital',
        'zip',
        'latitude',
        'longitude',
        'default',
        'active',
    ];

    protected $casts = [
        'active'     => 'boolean',
        'default'    => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
