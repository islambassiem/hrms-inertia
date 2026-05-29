<?php

declare(strict_types=1);

namespace App\Domain\Qualification\Models;

use App\Concerns\UserStamp;
use App\Domain\Qualification\Models\Scopes\RatingScope;
use Database\Factories\QualificationRatingFactory;
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
#[ScopedBy(RatingScope::class)]
final class Rating extends Model
{
    /** @use HasFactory<QualificationRatingFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<Rating> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    protected static function newFactory(): QualificationRatingFactory
    {
        return QualificationRatingFactory::new();
    }
}
