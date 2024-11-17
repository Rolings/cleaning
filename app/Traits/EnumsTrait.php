<?php

namespace App\Traits;

trait EnumsTrait
{
    public static function all()
    {
        return array_column(self::cases(), 'value');
    }
}
