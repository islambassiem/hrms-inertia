<?php

namespace App\Models;

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
}
