<?php

declare(strict_types=1);

namespace App\Domain\Research\Models;

use App\Concerns\UserStamp;
use App\Domain\Research\Models\Scopes\DomainScope;
use Database\Factories\ResearchDomainFactory;
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
#[ScopedBy(DomainScope::class)]
final class Domain extends Model
{
    /** @use HasFactory<ResearchDomainFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<Domain> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    protected static function newFactory(): ResearchDomainFactory
    {
        return ResearchDomainFactory::new();
    }
}
