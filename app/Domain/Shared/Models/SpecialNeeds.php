<?php

declare(strict_types=1);

namespace App\Domain\Shared\Models;

use App\Concerns\UserStamp;
use Database\Factories\SpecialNeedsFactory;
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
#[Table('shared_special_needs')]
final class SpecialNeeds extends Model
{
    /** @use HasFactory<SpecialNeedsFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<SpecialNeeds> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    protected static function newFactory(): SpecialNeedsFactory
    {
        return SpecialNeedsFactory::new();
    }
}
