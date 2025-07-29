<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends BaseModel
{
    /** @use HasFactory<\Database\Factories\SectionFactory> */
    use HasFactory;

    protected $table = '_sections';

    protected $fillable = [
        'code',
        'section_en',
        'section_ar',
        'created_by',
        'updated_by',
    ];
}
