<?php

declare(strict_types=1);

namespace App\Domain\Workflow\Enums;

enum WorkflowStatus: int
{
    case PENDING = 1;

    case APPROVED = 2;

    case REJECTED = 3;
}
