<?php

declare(strict_types=1);

namespace App\Domain\Leave\Enums;

enum TransactionType: int
{
    case ACCRUAL = 1;

    case DEDUCTION = 2;

    case MANUAL_ADJUSTMENT = 3;

    case LEAVE_TAKEN = 4;

    case CARRY_FORWARD = 5;

    case CARRY_EXPIRY = 6;
}
