<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specialty extends BaseModel
{
    /** @use HasFactory<\Database\Factories\SpecialtyFactory> */
    use HasFactory;

    protected $table = '_specialties';

    protected $fillable = [
        'code',
        'specialty_en',
        'specialty_ar',
        'created_by',
        'updated_by',
    ];
}
