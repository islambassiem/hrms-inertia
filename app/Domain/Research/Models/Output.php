<?php

declare(strict_types=1);

namespace App\Domain\Research\Models;

use App\Concerns\UserStamp;
use App\Domain\Research\Models\Scopes\OutputScope;
use Database\Factories\ResearchOutputFactory;
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
#[ScopedBy(OutputScope::class)]
final class Output extends Model
{
    /** @use HasFactory<ResearchOutputFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<Output> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    protected static function newFactory(): ResearchOutputFactory
    {
        return ResearchOutputFactory::new();
    }
}
