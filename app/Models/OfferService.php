<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferService extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'offer_id',
        'service_id',
    ];
}
