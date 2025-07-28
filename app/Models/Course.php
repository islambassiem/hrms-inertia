<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends BaseModel
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'name',
        'status',
        'issuer',
        'date_of_issue',
        'period',
        'city',
        'country_id',
        'created_by',
        'updated_by',
    ];
}
