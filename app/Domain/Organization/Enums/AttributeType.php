<?php

declare(strict_types=1);

namespace App\Domain\Organization\Enums;

enum AttributeType: string
{
    case POSITION = 'position';

    case JOB_TITLE = 'job_title';

    case ACADEMIC_RANK = 'academic_rank';

    case SPONSORSHIP = 'sponsorship';
}
