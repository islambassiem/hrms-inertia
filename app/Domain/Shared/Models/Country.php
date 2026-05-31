<?php

declare(strict_types=1);

namespace App\Domain\Shared\Models;

use App\Concerns\UserStamp;
use Database\Factories\CountryFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name_en',
    'name_ar',
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

    /** @use UserStamp<Country> */
    use UserStamp;

    protected static function newFactory(): CountryFactory
    {
        return CountryFactory::new();
    }
}
