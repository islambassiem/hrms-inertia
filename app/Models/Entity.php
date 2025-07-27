<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entity extends BaseModel
{
    /** @use HasFactory<\Database\Factories\EntityFactory> */
    use HasFactory;

    protected $table = '_entities';

    protected $fillable = [
        'code',
        'entity_en',
        'entity_ar',
        'created_by',
        'udated_by',
    ];
}
