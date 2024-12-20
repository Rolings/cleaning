<?php

namespace App\Models;

use App\Traits\PropertiesTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\{File, ProjectFile};


class Project extends Model
{
    use HasFactory, HasUuids, PropertiesTrait;

    protected $fillable = [
        'name',
        'slug',
        'active'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'active'     => 'boolean'
    ];

    /**
     * Relation with File model
     *
     * @return BelongsToMany
     */
    public function gallery(): BelongsToMany
    {
        return $this->belongsToMany(File::class, ProjectFile::class, 'project_id', 'file_id');
    }

    /**
     * @return string
     */
    public function image()
    {
        return $this->gallery->isEmpty() ? File::NO_IMAGE : $this->gallery[0]->url;
    }
}
