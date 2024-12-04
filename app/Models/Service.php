<?php

namespace App\Models;

use App\Traits\PropertiesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory, PropertiesTrait;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image_id',
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
     * @return string
     */
    public function getLimitDescriptionAttribute(): string
    {
        return Str::limit($this->description, 55);
    }
}
