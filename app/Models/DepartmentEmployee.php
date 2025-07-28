<?php

namespace App\Models;

class DepartmentEmployee extends BaseModel
{
    protected $table = 'department_employees';

    protected $fillable = [
        'department_id',
        'employee_id',
        'created_by',
        'updated_by',
    ];
}
