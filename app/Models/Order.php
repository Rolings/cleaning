<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'token',
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


    /**
     * @return BelongsTo
     */
    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class);
    }

    /***
     * @return HasOne
     */
    public function state(): HasOne
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }

    /**
     * @return HasMany
     */
    public function entities(): HasMany
    {
        return $this->hasMany(OrderEntity::class, 'order_id', 'id');
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

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
