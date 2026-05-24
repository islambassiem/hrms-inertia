<?php

declare(strict_types=1);

namespace App\Domain\Dependent\Models;

use App\Concerns\UserStamp;
use Database\Factories\DependentFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'employee_id',
    'name_en',
    'name_ar',
    'identification',
    'gender_id',
    'date_of_birth',
    'relationship_id',
    'has_insurance',
    'ticket_ratio',
    'created_by',
    'updated_by',
])]
#[Table('dependent_dependents')]
final class Dependent extends Model
{
    /** @use HasFactory<DependentFactory> */
    use HasFactory;

    /** @use UserStamp<Dependent> */
    use UserStamp;

    protected static function newFactory(): DependentFactory
    {
        return DependentFactory::new();
    }

    public function casts()
    {
        return [
            'date_of_birth' => 'immutable_date'
        ];
    }
}
