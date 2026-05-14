<?php

declare(strict_types=1);

namespace App\Domain\Shared\Models;

use App\Concerns\UserStamp;
use Database\Factories\RelationshipFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
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
#[Table('shared_relationships')]
final class Relationship extends Model
{
    /** @use HasFactory<RelationshipFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<Relationship> */
    use UserStamp;

    /** @var array<string> */
    public $translatable = ['name'];

    protected static function newFactory(): RelationshipFactory
    {
        return RelationshipFactory::new();
    }
}
