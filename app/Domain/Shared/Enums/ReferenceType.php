<?php

declare(strict_types=1);

namespace App\Domain\Shared\Enums;

enum ReferenceType: int
{
    case SHARED_GENDER = 1;

    case SHARED_MARITAL_STATUS = 2;

    case DEPENDENT_RELATIONSHIP = 3;

    case SHARED_RELIGION = 4;

    case EMPLOYEE_SPECIAL_NEEDS = 5;

    case COURSE_TYPE = 6;

    case QUALIFICATION_RATING = 7;

    case QUALIFICATION_GPA_TYPE = 8;

    case QUALIFICATION_STUDY_TYPE = 9;

    case QUALIFICATION_RESEARCH_TYPE = 10;

    case QUALIFICATION_EDUCATIONAL_SUB_LEVEL = 11;

    case QUALIFICATION_SCIENTIFIC_DEGREE = 12;

    case RESEARCH_DOMAIN = 13;

    case RESEARCH_LANGUAGE = 14;

    case RESEARCH_NATURE = 15;

    case RESEARCH_OUTPUT = 16;

    case RESEARCH_PROGRESS = 17;

    case RESEARCH_STATUS = 18;

    case RESEARCH_TYPE = 19;
}
