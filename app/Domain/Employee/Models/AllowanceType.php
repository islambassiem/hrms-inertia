<?php

declare(strict_types=1);

namespace App\Domain\Employee\Models;

use App\Concerns\UserStamp;
use Database\Factories\EmployeeAllowanceTypeFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

#[Fillable([
    'id',
    'name',
    'created_by',
    'updated_by',
])]
#[Table('employee_allowance_types')]
/**
 * @property int $id
 */
final class AllowanceType extends Model
{
    /** @use HasFactory<EmployeeAllowanceTypeFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<AllowanceType> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    protected static function newFactory(): EmployeeAllowanceTypeFactory
    {
        return EmployeeAllowanceTypeFactory::new();
    }
}
