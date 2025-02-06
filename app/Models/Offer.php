<?php

namespace App\Models;

use App\Traits\PropertiesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Offer extends Model
{
    use HasFactory, PropertiesTrait;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'active'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'active'     => 'boolean'
    ];

    /**
     * @return BelongsToMany
     */
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, OfferService::class, 'offer_id', 'service_id');
    }

    public function scopeCustomerOffer(Builder $query): Builder
    {
        return $query->where('slug', 'custom-cleaning');
    }

    /**
     * @return float
     */
    public function getPriceCalculation(): float
    {
        return $this->services->sum('price');
    }
}
