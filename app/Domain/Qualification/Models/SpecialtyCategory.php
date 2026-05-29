<?php

declare(strict_types=1);

namespace App\Domain\Qualification\Models;

use App\Concerns\UserStamp;
use Database\Factories\QualificationSpecialtyCategoryFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name_en',
    'name_ar',
    'parent_id',
    'code',
])]
#[Table('qualification_specialty_categories')]
/**
 * @property-read int $id
 */
final class SpecialtyCategory extends Model
{
    /** @use HasFactory<QualificationSpecialtyCategoryFactory> */
    use HasFactory;

    /** @use UserStamp<SpecialtyCategory> */
    use UserStamp;

    protected static function newFactory(): QualificationSpecialtyCategoryFactory
    {
        return QualificationSpecialtyCategoryFactory::new();
    }
}
