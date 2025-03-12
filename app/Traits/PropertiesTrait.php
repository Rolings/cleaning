<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait PropertiesTrait
{

    /**
     * Function return only active record
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeOnlyActive(Builder $query): Builder
    {
        return $query->where('active', true);
    }

    /**
     * @param Builder $query
     * @return Builder
     *
     */
    public function scopeOnlyApprove(Builder $query): Builder
    {
        return $query->where('approve', true);
    }
}
