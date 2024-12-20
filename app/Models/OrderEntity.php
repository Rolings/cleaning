<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderEntity extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'entity',
        'entity_id'
    ];
}
