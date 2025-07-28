<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Achievement extends BaseModel
{
    /** @use HasFactory<\Database\Factories\AchievementFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'title',
        'donor',
        'year',
        'created_by',
        'updated_by',
    ];
}
