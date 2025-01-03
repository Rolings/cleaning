<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class OrderEntity extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'entity',
        'entity_id'
    ];

    /**
     * @return MorphTo
     */
    public function entities(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'entity', 'entity_id');
    }
}
