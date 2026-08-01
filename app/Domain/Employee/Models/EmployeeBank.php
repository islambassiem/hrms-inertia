<?php

namespace App\Domain\Employee\Models;

use App\Concerns\UserStamp;
use Database\Factories\EmployeeBankFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


#[Fillable([
    'employee_id',
    'bank_id',
    'iban',
    'created_by',
    'updated_by',
])]
#[Table('employee_banks')]
/**
 * @property int $employee_id
 * @property int $bank_id
 * @property string $iban
 */
class EmployeeBank extends Model
{
    /** @use HasFactory<EmployeeBankFactory> */
    use HasFactory;

    /** @use UserStamp<EmployeeBank> */
    use UserStamp;

    protected static function newFactory(): EmployeeBankFactory
    {
        return EmployeeBankFactory::new();
    }

}
