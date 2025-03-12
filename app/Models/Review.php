<?php

namespace App\Models;

use App\Traits\PropertiesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Review extends Model
{
    use HasFactory, PropertiesTrait;

    protected $fillable = [
        'image_id',
        'service_id',
        'name',
        'email',
        'phone',
        'comment',
        'rating',
        'active',
        'approve',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'active'     => 'boolean',
        'approve'    => 'boolean',
    ];

    /**
     * @return HasOne
     */
    public function image(): HasOne
    {
        return $this->hasOne(File::class, 'id', 'image_id');
    }

    /**
     * @return HasOne
     */
    public function service(): HasOne
    {
        return $this->hasOne(Service::class, 'id', 'service_id');
    }

    /**
     * @return string
     */
    public function getLimitCommentAttribute(): string
    {
        return Str::limit($this->comment, 50);
    }

    /**
     * @return bool
     */
    public function isApproved(): bool
    {
        return $this->approve;
    }
}
