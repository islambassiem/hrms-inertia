<?php

declare(strict_types=1);

namespace App\Domain\Identity\Models;

use App\Concerns\UserStamp;
use Database\Factories\IdentityTypeFactory;
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
#[Table('identity_identity_types')]
final class IdentityType extends Model
{
    /** @use HasFactory<IdentityTypeFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<IdentityType> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    protected static function newFactory(): IdentityTypeFactory
    {
        return IdentityTypeFactory::new();
    }
}
