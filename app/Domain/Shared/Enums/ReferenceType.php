<?php

declare(strict_types=1);

namespace App\Domain\Shared\Enums;

enum ReferenceType: int
{
    /*
        The lower case name of the enuma has to match the file name in
        lookup-values directory. Also the order of the enums names is the
        order it is goin to be inserted in the databse.
    */
    case SHARED_GENDER = 1;

    case SHARED_MARITAL_STATUS = 2;

    case SHARED_RELIGION = 3;

    case EMPLOYEE_SPECIAL_NEEDS = 4;

    case DEPENDENT_RELATIONSHIP = 5;

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

    case WORKFLOW = 20;

    case LEAVE_TYPE = 21;

    case BANK = 22;
}
