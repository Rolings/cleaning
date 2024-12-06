<?php

namespace App\Models;

use App\Traits\PropertiesTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use PropertiesTrait;

    const NO_IMAGE = 'https://tgtdiagnostics.com/wp-content/themes/tgt/assets/svg/no.svg';

    protected $fillable = [
        'disk',
        'name',
        'type',
        'size',
        'active',
    ];

    public static function noAvatar(): string
    {
        return asset("./build/images/library/no-image/no-avatar.png");
    }

    public static function noImage(): string
    {
        return asset("./build/images/library/no-image/no-image.png");
    }

    /**
     * Function return file url
     *
     * @return string
     */
    public function getUrlAttribute(): string
    {
        return Storage::disk($this->disk)->exists($this->name)
            ? Storage::disk($this->disk)->url($this->name)
            : self::noImage();
    }
}
