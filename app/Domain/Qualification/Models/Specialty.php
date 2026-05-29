<?php

declare(strict_types=1);

namespace App\Domain\Qualification\Models;

use App\Concerns\UserStamp;
use Database\Factories\QualificationSpecialtyFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name_en',
    'name_ar',
    'category_id',    'code',
])]
#[Table('qualification_specialties')]
final class Specialty extends Model
{
    /** @use HasFactory<QualificationSpecialtyFactory> */
    use HasFactory;

    /** @use UserStamp<Specialty> */
    use UserStamp;

    protected static function newFactory(): QualificationSpecialtyFactory
    {
        return QualificationSpecialtyFactory::new();
    }
}
