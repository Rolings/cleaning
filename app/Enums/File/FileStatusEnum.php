<?php

namespace App\Enums\File;

use App\Traits\EnumsTrait;

enum FileStatusEnum: string
{
    use EnumsTrait;

    case PENDING = 'pending';

    case APPROVED = 'approved';

    case DECLINED = 'declined';
}
