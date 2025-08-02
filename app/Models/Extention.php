<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Extention extends BaseModel
{
    /** @use HasFactory<\Database\Factories\ExtentionFactory> */
    use HasFactory;

    protected $table = '_extentions';

    protected $fillable = [
        'number',
        'is_active',
        'owner',
        'created_by',
        'updated_by',
    ];
}
