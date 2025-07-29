<?php

namespace App\Models;

use App\Enums\IdentificationType;
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

    public function casts(): array
    {
        return [
            'type' => IdentificationType::class,
            'date_of_issue' => 'date',
            'date_of_expiry' => 'date',
        ];
    }
}
