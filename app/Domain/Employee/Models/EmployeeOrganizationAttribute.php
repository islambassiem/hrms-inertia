<?php

declare(strict_types=1);

namespace App\Domain\Employee\Models;

use App\Concerns\UserStamp;
use Database\Factories\EmployeeOrganizationAttributeFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'employee_id',
    'attribute_id',
    'start_date',
    'end_date',
    'created_by',
    'updated_by',
])]
#[Table('organization_employee_attributes')]
final class EmployeeOrganizationAttribute extends Model
{
    /** @use HasFactory<EmployeeOrganizationAttributeFactory> */
    use HasFactory;

    /** @use UserStamp<EmployeeOrganizationAttribute> */
    use UserStamp;

    public function casts(): array
    {
        return [
            'start_date' => 'immutable_date',
            'end_date' => 'immutable_date',
        ];
    }

    protected static function newFactory(): EmployeeOrganizationAttributeFactory
    {
        return EmployeeOrganizationAttributeFactory::new();
    }
}
