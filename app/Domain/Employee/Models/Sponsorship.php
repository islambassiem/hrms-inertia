<?php

declare(strict_types=1);

namespace App\Domain\Employee\Models;

use App\Concerns\UserStamp;
use Database\Factories\SponsorshipFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * @property int $id
 */
#[Fillable([
    'name',
    'code',
    'created_by',
    'updated_by',
])]
#[Table('employee_sponsorships')]
final class Sponsorship extends Model
{
    /** @use HasFactory<SponsorshipFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<Sponsorship> */
    use UserStamp;

    /** @var array<string> */
    public $translatable = ['name'];

    protected static function newFactory(): SponsorshipFactory
    {
        return SponsorshipFactory::new();
    }
}
