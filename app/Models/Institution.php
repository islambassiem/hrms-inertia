<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Institution extends BaseModel
{
    /** @use HasFactory<\Database\Factories\InstitutionFactory> */
    use HasFactory;

    protected $table = '_institutions';

    protected $fillable = [
        'code',
        'institution_en',
        'institution_ar',
        'created_by',
        'updated_by',
    ];
}
