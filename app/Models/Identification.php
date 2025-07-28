<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Identification extends BaseModel
{
    /** @use HasFactory<\Database\Factories\IdentificationFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'type',
        'id_number',
        'place_of_issue',
        'date_of_issue',
        'date_of_expiry',
        'created_by',
        'updated_by',
    ];
}
