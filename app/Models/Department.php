<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Department extends BaseModel
{
    /** @use HasFactory<\Database\Factories\DepartmentFactory> */
    use HasFactory;

    protected $table = '_departments';

    protected $fillable = [
        'code',
        'department_en',
        'department_ar',
    ];

    /**
     * @return HasManyThrough<Branch, DepartmentHierarchy, $this>
     */
    public function branches(): HasManyThrough
    {
        return $this->hasManyThrough(
            Branch::class,
            DepartmentHierarchy::class,
            'department_id',
            'id',
            'id',
            'branch_id'
        )->distinct();
    }

    /**
     * @return HasManyThrough<College, DepartmentHierarchy, $this>
     */
    public function colleges(): HasManyThrough
    {
        return $this->hasManyThrough(
            College::class,
            DepartmentHierarchy::class,
            'department_id',
            'id',
            'id',
            'college_id'
        )->distinct();
    }

    /**
     * @return HasManyThrough<Entity, DepartmentHierarchy, $this>
     */
    public function entities(): HasManyThrough
    {
        return $this->hasManyThrough(
            Entity::class,
            DepartmentHierarchy::class,
            'department_id',
            'id',
            'id',
            'entity_id'
        )->distinct();
    }

    /**
     * @return BelongsToMany<Employee, $this>
     */
    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class);
    }
}
