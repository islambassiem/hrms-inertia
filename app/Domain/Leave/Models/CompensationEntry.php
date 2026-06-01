<?php

declare(strict_types=1);

namespace App\Domain\Leave\Models;

use Database\Factories\LeaveCompensationEntriesFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'leave_request_id',
    'days',
    'compensation_rate',
])]
#[Table('leave_compensation_entries')]
final class CompensationEntry extends Model
{
    /** @use HasFactory<LeaveCompensationEntriesFactory> */
    use HasFactory;

    protected static function newFactory(): LeaveCompensationEntriesFactory
    {
        return LeaveCompensationEntriesFactory::new();
    }
}
