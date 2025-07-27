<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends BaseModel
{
    /** @use HasFactory<\Database\Factories\CountryFactory> */
    use HasFactory;

    protected $table = '_countries';

    protected $fillable = [
        'code',
        'country_en',
        'country_ar',
        'created_by',
        'updated_by',
    ];
}
