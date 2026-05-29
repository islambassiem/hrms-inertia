<?php

declare(strict_types=1);

namespace App\Domain\Qualification\Models;

use App\Concerns\UserStamp;
use Database\Factories\QualificationIncludedSpecialtyFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name_en',
    'name_ar',
    'code',
])]
#[Table('qualification_included_specialties')]
final class IncludedSpecialty extends Model
{
    /** @use HasFactory<QualificationIncludedSpecialtyFactory> */
    use HasFactory;

    /** @use UserStamp<IncludedSpecialty> */
    use UserStamp;

    protected static function newFactory(): QualificationIncludedSpecialtyFactory
    {
        return QualificationIncludedSpecialtyFactory::new();
    }
}
