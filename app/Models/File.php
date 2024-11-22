<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    const NO_IMAGE = 'https://tgtdiagnostics.com/wp-content/themes/tgt/assets/svg/no.svg';

    protected $fillable = [
        'disk',
        'name',
        'type',
        'size',
        'active',
    ];

    /**
     * Function return file url
     *
     * @return string
     */
    public function getUrlAttribute(): string
    {
        return Storage::disk($this->disk)->url($this->name);
    }

}
