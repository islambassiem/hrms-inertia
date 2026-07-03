<?php

declare(strict_types=1);

namespace App\Domain\Employee\Models;

use App\Concerns\UserStamp;
use Database\Factories\EmployeeExtentionFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'employee_id',
    'extention',
    'created_by',
    'updated_by',
])]
#[Table('employee_extentions')]
final class EmployeeExtention extends Model
{
    /** @use HasFactory<EmployeeExtentionFactory> */
    use HasFactory;

    /** @use UserStamp<EmployeeExtention> */
    use UserStamp;

    protected static function newFactory(): EmployeeExtentionFactory
    {
        return EmployeeExtentionFactory::new();
    }
}
