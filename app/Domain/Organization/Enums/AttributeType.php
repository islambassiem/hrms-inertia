<?php

declare(strict_types=1);

namespace App\Domain\Organization\Enums;

enum AttributeType: int
{
    case SPONSORSHIP = 1;

    case JOB_TITLE = 2;

    case POSITION = 3;

    case ACADEMIC_RANK = 4;

    case ADMIN_RANK = 5;

    case UNIT = 6;

    case TEAM = 7;
}
