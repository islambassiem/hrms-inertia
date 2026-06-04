<?php

declare(strict_types=1);

namespace App\Domain\Leave\Models;

use Database\Factories\LeaveBalanceFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'employee_id',
    'balance',
])]
#[Table('leave_balances')]
final class Balance extends Model
{
    /** @use HasFactory<LeaveBalanceFactory> */
    use HasFactory;

    protected static function newFactory(): LeaveBalanceFactory
    {
        return LeaveBalanceFactory::new();
    }
}
