<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class OtherExperience extends BaseModel
{
    /** @use HasFactory<\Database\Factories\OtherExperienceFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'profession',
        'organization_name',
        'city',
        'country_id',
        'department',
        'section',
        'start_date',
        'end_date',
        'functional_tasks',
        'functional_tasks',
        'created_by',
        'updated_by',
    ];

    public function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }
}
