<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AcademicRank extends BaseModel
{
    /** @use HasFactory<\Database\Factories\AcademicRankFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'academic_rank',
        'effective_date',
        'end_date',
        'created_by',
        'updated_by',
    ];

    /**
     * @return BelongsTo<Employee, $this>
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
