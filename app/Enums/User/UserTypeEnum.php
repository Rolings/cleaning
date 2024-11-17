<?php

namespace App\Enums\User;

use App\Traits\EnumsTrait;

enum UserTypeEnum: string
{
    use EnumsTrait;

    case ADMIN = 'admin';
    case CLIENT = 'client';
}
