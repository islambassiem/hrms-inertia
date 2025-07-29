<?php

namespace App\Models;

use App\Enums\AcademicRank;
use App\Enums\AccomodationStatus;
use App\Enums\AppointmentType;
use App\Enums\EmploymentStatus;
use App\Enums\JobNature;
use App\Enums\ProfessionalRank;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicExperience extends BaseModel
{
    /** @use HasFactory<\Database\Factories\AcademicExperienceFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'position',
        'institution_id',
        'city_id',
        'faculty_id',
        'section_id',
        'major_id',
        'minor_id',
        'employment_number',
        'academic_rank',
        'professional_rank',
        'hiring_date',
        'joining_date',
        'resignation_date',
        'appointment_type',
        'employment_status',
        'tasks',
        'job_nature',
        'accommodation_status',
        'created_by',
        'updated_by',
    ];

    public function casts(): array
    {
        return [
            'academic_rank' => AcademicRank::class,
            'professional_rank' => ProfessionalRank::class,
            'hiring_date' => 'date',
            'joining_date' => 'date',
            'resignation_date' => 'date',
            'appointment_type' => AppointmentType::class,
            'employment_status' => EmploymentStatus::class,
            'job_nature' => JobNature::class,
            'accommodation_status' => AccomodationStatus::class,
        ];
    }
}
