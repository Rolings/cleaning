<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Price extends Model
{
    /**
     * @var string
     */
    protected $table = 'prices';

    /**
     * @var string[]
     */
    protected $fillable = [
        'service_id',
        'room_type_id',
        'room_quantity',
        'price_by_unit',
        'price_for_next_unit',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'quantity'            => 'float',
        'price_by_unit'       => 'float',
        'price_for_next_unit' => 'float',
        'created_at'          => 'datetime',
        'updated_at'          => 'datetime',
    ];

    /**
     * @return BelongsTo
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * @return BelongsTo
     */
    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }
}
