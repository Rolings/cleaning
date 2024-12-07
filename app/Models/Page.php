<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'page',
        'description',
        'keywords',
        'robot_index',
    ];

    protected $casts = [
        'robot_index' => 'boolean',
    ];
}
