<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends BaseModel
{
    /** @use HasFactory<\Database\Factories\DepartmentFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'department_en',
        'department_ar',
    ];
}
