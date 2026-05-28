<?php

declare(strict_types=1);

namespace App\Domain\Shared\Models;

use App\Concerns\UserStamp;
use App\Domain\Shared\Models\Scopes\RelationshipScope;
use Database\Factories\RelationshipFactory;
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
#[ScopedBy(RelationshipScope::class)]
final class Relationship extends Model
{
    /** @use HasFactory<RelationshipFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<Relationship> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    protected static function newFactory(): RelationshipFactory
    {
        return RelationshipFactory::new();
    }
}
