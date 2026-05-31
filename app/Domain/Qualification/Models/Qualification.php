<?php

declare(strict_types=1);

namespace App\Domain\Qualification\Models;

use App\Concerns\UserStamp;
use Database\Factories\QualificationsFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'employee_id',
    'major_id',
    'minor_id',
    'educational_sub_level_id',
    'included_specialty_id',
    'institution_name',
    'college_name',
    'scientific_degree_id',
    'graduation_date',
    'graduation_country_id',
    'is_last_qualification',
    'rating_id',
    'gpa',
    'gpa_type_id',
    'study_type_id',
    'city',
    'research_type_id',
    'is_authenticated',
    'created_by',
    'updated_by',
])]
#[Table('qualifications')]
/**
 * @property-read \Carbon\CarbonImmutable $graduation_date
 */
final class Qualification extends Model
{
    /** @use HasFactory<QualificationsFactory> */
    use HasFactory;

    /** @use UserStamp<Qualification> */
    use UserStamp;

    public function casts(): array
    {
        return [
            'graduation_date' => 'immutable_date',
        ];
    }

    protected static function newFactory(): QualificationsFactory
    {
        return QualificationsFactory::new();
    }
}
