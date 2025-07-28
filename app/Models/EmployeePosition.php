<?php

namespace App\Models;

class EmployeePosition extends BaseModel
{
    protected $table = 'employee_position';

    protected $fillable = [
        'employee_id',
        'position_id',
        'created_by',
        'updated_by',
    ];
}
