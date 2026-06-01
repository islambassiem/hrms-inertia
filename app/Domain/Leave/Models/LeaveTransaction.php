<?php

declare(strict_types=1);

namespace App\Domain\Leave\Models;

use Database\Factories\LeaveTransactionsFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'employee_id',
    'leave_type_id',
    'leave_request_id',
    'transaction_type',
    'amount',
])]
#[Table('leave_transactions')]
final class LeaveTransaction extends Model
{
    /** @use HasFactory<LeaveTransactionsFactory> */
    use HasFactory;

    protected static function newFactory(): LeaveTransactionsFactory
    {
        return LeaveTransactionsFactory::new();
    }
}
