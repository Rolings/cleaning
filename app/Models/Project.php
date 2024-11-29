<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\{File, ProjectFile};


class Project extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'title',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relation with File model
     *
     * @return BelongsToMany
     */
    public function mainPhoto(): BelongsToMany
    {
        return $this->belongsToMany(File::class, ProjectFile::class, 'project_id', 'file_id')->wherePivot('main', true);
    }

    /**
     * Relation with File model
     *
     * @return BelongsToMany
     */
    public function gallery(): BelongsToMany
    {
        return $this->belongsToMany(File::class, ProjectFile::class, 'project_id', 'file_id');
    }
}
