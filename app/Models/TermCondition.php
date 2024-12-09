<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class TermCondition extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopePageTermsCondition(Builder $query): Builder
    {
        return $query->where('slug', 'terms-condition');
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopePagePrivacyPolicy(Builder $query): Builder
    {
        return $query->where('slug', 'privacy-policy');
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopePageCookies(Builder $query): Builder
    {
        return $query->where('slug', 'cookies');
    }
}
