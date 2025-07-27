<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class DepartmentHierarchy extends BaseModel
{
    /** @use HasFactory<\Database\Factories\DepartmentHierarchyFactory> */
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'college_id',
        'department_id',
        'entity_id',
        'created_by',
        'updated_by',
    ];
}
