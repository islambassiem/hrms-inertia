<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sponsorship extends BaseModel
{
    /** @use HasFactory<\Database\Factories\SponsorshipFactory> */
    use HasFactory;

    protected $table = '_sponsorships';

    protected $fillable = [
        'code',
        'country_en',
        'country_ar',
        'created_by',
        'updated_by',
    ];
}
