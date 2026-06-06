<?php

declare(strict_types=1);

namespace App\Domain\Leave\Models;

use Database\Factories\LeaveSickLeaveCycleFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'employee_id',
    'start_date',
    'end_date',
    'used_days',
])]
#[Table('leave_employee_sick_leave_cycles')]
final class SickLeaveCycle extends Model
{
    /** @use HasFactory<LeaveSickLeaveCycleFactory> */
    use HasFactory;

    public function casts(): array
    {
        return [
            'start_date' => 'immutable_date',
            'end_date' => 'immutable_date',
        ];
    }

    protected static function newFactory(): LeaveSickLeaveCycleFactory
    {
        return LeaveSickLeaveCycleFactory::new();
    }
}
