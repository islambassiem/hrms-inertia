<?php

declare(strict_types=1);

namespace App\Domain\Leave\Enums;

enum LeaveStatus: int
{
    case PENDING = 1;

    case APPROVED = 2;

    case REJECTED = 3;

    case CANCELLED = 4;
}
