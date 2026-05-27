<?php

declare(strict_types=1);

namespace App\Domain\Shared\Models;

use App\Concerns\UserStamp;
use Database\Factories\GenderFactory;
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
#[Table('shared_genders')]
final class Gender extends Model
{
    /** @use HasFactory<GenderFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<Gender> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    protected static function newFactory(): GenderFactory
    {
        return GenderFactory::new();
    }
}
