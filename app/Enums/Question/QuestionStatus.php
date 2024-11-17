<?php

namespace App\Enums\Question;

use App\Traits\EnumsTrait;

enum QuestionStatus: string
{
    use EnumsTrait;

    case PUBLIC = 'public';
    case PRIVATE = 'private';
}
