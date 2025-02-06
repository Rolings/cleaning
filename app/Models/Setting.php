<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use App\Services\File\FileService;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * Function find setting by user id and key
     *
     * @param string $key
     * @return $this
     */
    public static function findByKey(string $key): ?self
    {
        return self::key($key)->first();
    }

    /**
     * @param string $key
     * @return File|null
     */
    public static function findFileByKey(string $key)
    {
        $setting = self::findByKey($key);

        if (is_null($setting))
            return null;

        $fileService = new FileService();

        return $fileService->findFile($setting->value);
    }

    /**
     * @param string $key
     * @param string $value
     * @return bool
     */
    public static function setByKey(string $key, string $value = null): self
    {
        return self::updateOrCreate(['key' => $key], ['value' => $value]);
    }

    /**
     * @param $query
     * @param $value
     * @return Builder
     */
    public function scopeKey(Builder $query, $value): Builder
    {
        return $query->where('key', $value);
    }

    /**
     * @return string
     */
    public function getLimitValueAttribute(): string
    {
        return Str::limit($this->attributes['value'], 300);
    }
}
