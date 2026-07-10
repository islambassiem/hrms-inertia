<?php

declare(strict_types=1);

namespace App\Domain\Employee\Models;

use App\Concerns\UserStamp;
use Database\Factories\EmployeeSalaryFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'employee_id',
    'basic',
    'effective_from',
    'effective_to',
    'created_by',
    'updated_by',
])]
#[Table('employee_salaries')]
/**
 * @property int $employee_id
 * @property int $basic
 * @property Carbon $effective_from
 * @property Carbon|null $effective_to
 */
final class Salary extends Model
{
    /** @use HasFactory<EmployeeSalaryFactory> */
    use HasFactory;

    /** @use UserStamp<Salary> */
    use UserStamp;

    protected static function newFactory(): EmployeeSalaryFactory
    {
        return EmployeeSalaryFactory::new();
    }

    protected function casts()
    {
        return [
            'effective_from' => 'date:Y-m-d',
            'effective_to' => 'date:Y-m-d',
        ];
    }
}
