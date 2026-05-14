<?php

declare(strict_types=1);

namespace App\Domain\Shared\Models;

use App\Concerns\UserStamp;
use Database\Factories\CountryFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

#[Fillable([
    'name',
    'code',
    'order',
    'lang',
    'is_active',
    'created_by',
    'updated_by',
])]
#[Table('shared_countries')]
final class Country extends Model
{
    /** @use HasFactory<CountryFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<Country> */
    use UserStamp;

    /** @var array<string> */
    public $translatable = ['name'];

    protected static function newFactory(): CountryFactory
    {
        return CountryFactory::new();
    }
}
