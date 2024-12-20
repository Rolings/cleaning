<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceAdditionalService extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'service_id',
        'additional_service_id',
    ];
}
