<?php

declare(strict_types=1);

namespace App\Domain\Shared\Models;

use App\Concerns\UserStamp;
use App\Domain\Shared\Models\Scopes\MaritalStatusScope;
use Database\Factories\MaritalStatusFactory;
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
#[ScopedBy(MaritalStatusScope::class)]
final class MaritalStatus extends Model
{
    /** @use HasFactory<MaritalStatusFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<MaritalStatus> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    protected static function newFactory(): MaritalStatusFactory
    {
        return new MaritalStatusFactory();
    }
}
