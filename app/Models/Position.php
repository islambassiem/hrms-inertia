<?php

namespace App\Models;

use App\Enums\PositionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Position extends BaseModel
{
    /** @use HasFactory<\Database\Factories\PositionFactory> */
    use HasFactory;

    protected $table = '_positions';

    protected $fillable = [
        'code',
        'position_en',
        'position_ar',
        'entity_id',
        'type',
        'created_by',
        'updated_by',
    ];

    public function casts(): array
    {
        return [
            'type' => PositionType::class,
        ];
    }

    /**
     * @return BelongsToMany<Employee, $this>
     */
    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class);
    }
}
