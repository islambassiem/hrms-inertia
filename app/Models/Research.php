<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Research extends BaseModel
{
    /** @use HasFactory<\Database\Factories\ResearchFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'type',
        'status',
        'progress',
        'nature',
        'domain',
        'citation',
        'language',
        'title',
        'publication_location',
        'publication_date',
        'publisher',
        'edition',
        'isbn',
        'magazine',
        'publishing_url',
        'summary',
        'key_words',
        'pages_number',
        'created_by',
        'updated_by',
    ];
}
