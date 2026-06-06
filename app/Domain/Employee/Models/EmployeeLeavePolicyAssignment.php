<?php

declare(strict_types=1);

namespace App\Domain\Employee\Models;

use App\Concerns\UserStamp;
use Database\Factories\EmployeeLeavePolicyAssignmentFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'employee_id',
    'policy_id',
    'start_date',
    'end_date',
    'created_by',
    'updated_by',
])]
#[Table('employee_leave_policy_assignments')]
final class EmployeeLeavePolicyAssignment extends Model
{
    /** @use HasFactory<EmployeeLeavePolicyAssignmentFactory> */
    use HasFactory;

    /** @use UserStamp<EmployeeLeavePolicyAssignment> */
    use UserStamp;

    public static function newFactory(): EmployeeLeavePolicyAssignmentFactory
    {
        return EmployeeLeavePolicyAssignmentFactory::new();
    }

    protected function casts(): array
    {
        return [
            'start_date' => 'immutable_date',
            'end_date' => 'immutable_date',
        ];
    }
}
