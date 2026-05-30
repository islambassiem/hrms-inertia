<?php

declare(strict_types=1);

namespace App\Domain\Research\Models;

use App\Concerns\UserStamp;
use App\Domain\Research\Models\Scopes\ProgressScope;
use Database\Factories\ResearchProgressFactory;
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
#[ScopedBy(ProgressScope::class)]
final class Progress extends Model
{
    /** @use HasFactory<ResearchProgressFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<Progress> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    protected static function newFactory(): ResearchProgressFactory
    {
        return ResearchProgressFactory::new();
    }
}
