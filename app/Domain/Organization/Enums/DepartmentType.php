<?php

declare(strict_types=1);

namespace App\Domain\Organization\Enums;

enum DepartmentType: string
{
    case DEPARTMENT = 'department';
    case COLLEGE = 'college';
    case ENTITY = 'entity';
}
