<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Branch extends BaseModel
{
    /** @use HasFactory<\Database\Factories\BranchFactory> */
    use HasFactory;

    protected $table = '_branches';

    protected $fillable = [
        'code',
        'branch_en',
        'branch_ar',
        'entity_id',
        'created_by',
        'updated_by',
    ];

    /**
     * @return BelongsTo<Entity, $this>
     */
    public function entity(): BelongsTo
    {
        return $this->belongsTo(Entity::class);
    }
}
