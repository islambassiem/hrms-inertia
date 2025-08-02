<?php

namespace App\Models;

class EmployeeExtention extends BaseModel
{
    protected $table = 'employee_extention';

    protected $fillable = [
        'employee_id',
        'extention_id',
        'created_by',
        'updated_by',
    ];
}
