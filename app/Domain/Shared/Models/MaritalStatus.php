<?php

declare(strict_types=1);

namespace App\Domain\Shared\Models;

use App\Concerns\UserStamp;
use Database\Factories\MaritalStatusFactory;
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
#[Table('shared_marital_statuses')]
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
