<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends BaseModel
{
    /** @use HasFactory<\Database\Factories\FacultyFactory> */
    use HasFactory;

    protected $table = '_faculties';

    protected $fillable = [
        'code',
        'faculty_en',
        'faculty_ar',
        'created_by',
        'updated_by',
    ];
}
