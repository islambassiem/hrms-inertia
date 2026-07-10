<?php

declare(strict_types=1);

namespace App\Domain\Employee\Models;

use App\Concerns\UserStamp;
use Database\Factories\EmployeeAllowanceFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'employee_id',
    'allowance_type_id',
    'amount',
    'effective_from',
    'effective_to',
    'created_by',
    'updated_by',
])]
#[Table('employee_allowances')]
final class Allowance extends Model
{
    /** @use HasFactory<EmployeeAllowanceFactory> */
    use HasFactory;

    /** @use UserStamp<Allowance> */
    use UserStamp;

    protected static function newFactory(): EmployeeAllowanceFactory
    {
        return EmployeeAllowanceFactory::new();
    }
}
