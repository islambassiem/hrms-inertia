<?php

declare(strict_types=1);

namespace App\Domain\Organization\Models;

use App\Concerns\UserStamp;
use Database\Factories\EmployeeAttributeFactory;
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
final class EmployeeAttribute extends Model
{
    /** @use HasFactory<EmployeeAttributeFactory> */
    use HasFactory;

    /** @use UserStamp<EmployeeAttribute> */
    use UserStamp;

    public function casts(): array
    {
        return [
            'start_date' => 'immutable_date',
            'end_date' => 'immutable_date',
        ];
    }

    protected static function newFactory(): EmployeeAttributeFactory
    {
        return EmployeeAttributeFactory::new();
    }
}
