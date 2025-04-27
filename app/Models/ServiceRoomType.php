<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRoomType extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'service_id',
        'room_type_id',
    ];
}
