<?php

declare(strict_types=1);

namespace App\Domain\Shared\Models;

use App\Concerns\UserStamp;
use Database\Factories\ReferenceTypeFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

#[Fillable([
    'name',
    'filename',
    'created_by',
    'updated_by',
])]
#[Table('shared_reference_types')]
final class ReferenceType extends Model
{
    /** @use HasFactory<ReferenceTypeFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<ReferenceType> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    protected static function newFactory(): ReferenceTypeFactory
    {
        return ReferenceTypeFactory::new();
    }
}
