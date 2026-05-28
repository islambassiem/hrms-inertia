<?php

declare(strict_types=1);

namespace App\Domain\Shared\Models;

use App\Concerns\UserStamp;
use App\Domain\Shared\Models\Scopes\ReligionScope;
use Database\Factories\ReligionFactory;
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
#[ScopedBy(ReligionScope::class)]
final class Religion extends Model
{
    /** @use HasFactory<ReligionFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<Religion> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    protected static function newFactory(): ReligionFactory
    {
        return ReligionFactory::new();
    }
}
