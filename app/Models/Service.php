<?php

namespace App\Models;

use App\Traits\PropertiesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory, PropertiesTrait;

    protected $fillable = [
        'image_id',
        'name',
        'slug',
        'price',
        'description',
        'active',
    ];

    protected $casts = [
        'image_id'   => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'active'     => 'boolean',
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Relation with mode File
     *
     * @return HasOne
     */
    public function image(): HasOne
    {
        return $this->hasOne(File::class, 'id', 'image_id');
    }

    /**
     * Relation with mode AdditionalService
     *
     * @return BelongsToMany
     */
    public function additional(): BelongsToMany
    {
        return $this->belongsToMany(AdditionalService::class, ServiceAdditionalService::class, 'service_id', 'additional_service_id');
    }

    /**
     * @return BelongsToMany
     */
    public function offers(): BelongsToMany
    {
        return $this->belongsToMany(Offer::class, OfferService::class, 'service_id', 'offer_id');
    }

    /**
     * @return string
     */
    public function getImageUrlAttribute(): string
    {
        $this->load('image');

        return is_null($this->image) ? File::noImage() : $this->image->url;
    }

    /**
     * @return string
     */
    public function getLimitDescriptionAttribute(): ?string
    {
        return Str::limit($this->description, 55);
    }

    public function getEntity()
    {
        return self::class;
    }
}
