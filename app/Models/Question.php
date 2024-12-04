<?php

namespace App\Models;

use App\Traits\PropertiesTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    use HasFactory, PropertiesTrait;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'question',
        'answer',
        'top',
        'active',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'active'     => 'boolean',
    ];

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOnlyTop(Builder $query): Builder
    {
        return $query->where('top', true);
    }

    /**
     * @return string
     */
    public function getLimitQuestionAttribute(): string
    {
        return Str::limit($this->question, 40);
    }
}
