<?php

namespace App\Domain\Shared\Models;

use App\Concerns\UserStamp;
use App\Domain\Shared\Models\Scopes\BankScope;
use Database\Factories\BankFactory;
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
#[ScopedBy(BankScope::class)]
/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Bank extends Model
{
    /** @use HasFactory<BankFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<Bank> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    protected static function newFactory(): BankFactory
    {
        return BankFactory::new();
    }
}
