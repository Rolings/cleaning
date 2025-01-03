<?php

namespace App\Models;

use Dom\Entity;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Order extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'offer_id',
        'state_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'address',
        'apt_suite',
        'city',
        'zip',
        'order_at',
        'comment',
        'is_read',
    ];

    protected $casts = [
        'order_at'   => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class);
    }

    public function entity(): BelongsToMany
    {
        return $this->belongsToMany(OrderEntity::class);

    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeRead(Builder $query): Builder
    {
        return $query->where('is_read', true);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeUnread(Builder $query): Builder
    {
        return $query->where('is_read', false);
    }
}
