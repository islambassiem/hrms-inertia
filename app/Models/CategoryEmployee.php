<?php

namespace App\Models;

class CategoryEmployee extends BaseModel
{
    protected $table = 'category_employee';

    protected $fillable = [
        'category_id',
        'employee_id',
        'created_by',
        'updated_by',
    ];
}
