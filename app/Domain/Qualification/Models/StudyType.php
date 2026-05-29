<?php

declare(strict_types=1);

namespace App\Domain\Qualification\Models;

use App\Concerns\UserStamp;
use App\Domain\Qualification\Models\Scopes\StudyTypeScope;
use Database\Factories\QualificationStudyTypeFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

#[Fillable([
    'name',
    'code',
    'created_by',
    'updated_by',
])]
#[Table('shared_reference_values')]
#[ScopedBy(StudyTypeScope::class)]
final class StudyType extends Model
{
    /** @use HasFactory<QualificationStudyTypeFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<StudyType> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    protected static function newFactory(): QualificationStudyTypeFactory
    {
        return QualificationStudyTypeFactory::new();
    }
}
