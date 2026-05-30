<?php

declare(strict_types=1);

namespace App\Domain\Research\Models;

use App\Concerns\UserStamp;
use Database\Factories\ResearchFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'employee_id',
    'status_id',
    'type_id',
    'nature_id',
    'domain_id',
    'title',
    'publishing_date',
    'publisher',
    'isbn',
    'magazine',
    'edition',
    'page_count',
    'publication_location',
    'summary',
    'language_id',
    'publishing_url',
    'keywords',
    'created_by',
    'updated_by',
])]
#[Table('research')]
/**
 * @property-read CarbonImmutable $publishing_date
 */
final class Research extends Model
{
    /** @use HasFactory<ResearchFactory> */
    use HasFactory;

    /** @use UserStamp<Research> */
    use UserStamp;

    public function casts(): array
    {
        return [
            'publishing_date' => 'immutable_date',
        ];
    }

    protected static function newFactory(): ResearchFactory
    {
        return ResearchFactory::new();
    }
}
