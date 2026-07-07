<?php

declare(strict_types=1);

namespace App\Domain\Identity\Enums;

enum IdentityEnum: int
{
    case NATIONAL_IDENTITY = 1;
    case PASSPORT = 2;
}
