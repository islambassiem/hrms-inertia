<?php

declare(strict_types=1);

namespace App\Domain\Experience\Models;

use App\Concerns\UserStamp;
use Database\Factories\ExperienceFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'employee_id',
    'position',
    'organization',
    'city',
    'country_id',
    'department',
    'section',
    'start_date',
    'end_date',
    'tasks',
    'created_by',
    'updated_by',
])]
#[Table('experience_experiences')]
final class Experience extends Model
{
    /** @use HasFactory<ExperienceFactory> */
    use HasFactory;

    /** @use UserStamp<Experience> */
    use UserStamp;

    public function casts(): array
    {
        return [
            'start_date' => 'immutable_date',
            'end_date' => 'immutable_date',
        ];
    }

    protected static function newFactory(): ExperienceFactory
    {
        return ExperienceFactory::new();
    }
}
