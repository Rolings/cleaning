<?php

namespace App\Models;

use App\Traits\PropertiesTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class AdditionalService extends Model
{
    use PropertiesTrait;

    protected $fillable = [
        'id',
        'icon_id',
        'base64image',
        'name',
        'description',
        'price',
        'active',
    ];

    protected $casts = [
        'active'     => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relation with mode File
     *
     * @return HasOne
     */
    public function icon(): HasOne
    {
        return $this->hasOne(File::class, 'id', 'icon_id');
    }

    /**
     * @return string
     */
    public function getIconUrlAttribute(): string
    {
        $this->load('icon');

        return is_null($this->icon) ? (empty($this->base64image) ? File::noImage() : $this->base64image) : $this->icon->url;
    }

    /**
     * @return string
     */
    public function getLimitDescriptionAttribute(): ?string
    {
        return Str::limit($this->description, 55);
    }

    /**
     * @return \class-string
     */
    public function getEntity()
    {
        return self::class;
    }
}
