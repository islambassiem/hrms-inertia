<?php

namespace App\Models;

use App\Enums\FamilyRelationship;
use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dependent extends BaseModel
{
    /** @use HasFactory<\Database\Factories\DependentFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'name',
        'identification',
        'gender',
        'date_of_birth',
        'relationship',
        'created_by',
        'updated_by',
    ];

    public function casts(): array
    {
        return [
            'gender' => Gender::class,
            'date_of_birth' => 'date',
            'releationship' => FamilyRelationship::class,
        ];
    }

    /**
     * @return BelongsTo<Employee, $this>
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
