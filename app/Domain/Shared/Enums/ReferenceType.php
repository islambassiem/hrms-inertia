<?php

declare(strict_types=1);

namespace App\Domain\Shared\Enums;

enum ReferenceType: int
{
    case GENDER = 1;

    case MARITAL_STATUS = 2;

    case RELATIONSHIP = 3;

    case RELIGION = 4;

    case SPECIAL_NEEDS = 5;

    case COURSE_TYPE = 6;
}
