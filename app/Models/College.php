<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class College extends BaseModel
{
    /** @use HasFactory<\Database\Factories\CollegeFactory> */
    use HasFactory;

    protected $table = '_colleges';

    protected $fillable = [
        'branch_id',
        'code',
        'college_en',
        'college_ar',
        'created_by',
        'updated_by',
    ];

    /**
     * @return BelongsTo<Branch, $this>
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
