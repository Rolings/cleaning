<?php

namespace App\Models;

use App\Traits\PropertiesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoomType extends Model
{
    use HasFactory, PropertiesTrait;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'min',
        'max',
        'fractional',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * Relations with Price model
     *
     * @return HasMany
     */
    public function prices(): HasMany
    {
        return $this->hasMany(Price::class, 'room_type_id', 'id');
    }

    /**
     * Relation with mode AdditionalService
     *
     * @return BelongsToMany
     */
    public function additional(): BelongsToMany
    {
        return $this->belongsToMany(AdditionalService::class, RoomTypeAdditionalService::class, 'room_type_id', 'additional_service_id');
    }

    /***
     * @return array
     */
    public function getRoomSteps(): array
    {
        $step = $this->fractional ? 0.5 : 1;
        $range = range($this->min, $this->max, $step);

        return array_map(fn($v) => $this->fractional ? round($v, 1) : (int)$v, $range);
    }
}
