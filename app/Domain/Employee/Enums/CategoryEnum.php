<?php

declare(strict_types=1);

namespace App\Domain\Employee\Enums;

enum CategoryEnum: int
{
    case FACULTY_STAFF = 1;
    case ADMIN = 2;
    case DRIVER = 3;
    case CLEANER = 4;
    case MAINTENANCE = 5;
    case CONSULTANT = 6;
}
