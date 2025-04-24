<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomTypeAdditionalService extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'room_type_id',
        'additional_service_id',
    ];
}
