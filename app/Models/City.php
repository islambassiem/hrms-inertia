<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends BaseModel
{
    /** @use HasFactory<\Database\Factories\CityFactory> */
    use HasFactory;

    protected $table = '_cities';

    protected $fillable = [
        'code',
        'city_en',
        'city_ar',
        'created_by',
        'updated_by',
    ];
}
