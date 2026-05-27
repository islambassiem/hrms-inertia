<?php

declare(strict_types=1);

namespace App\Domain\Shared\Models;

use Database\Factories\ReferenceValueFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name_ar',
    'name_en',
    'code',
    'sort_order',
    'reference_type_id',
    'created_by',
    'updated_by',
])]
#[Table('shared_reference_values')]
final class ReferenceValue extends Model
{
    /** @use HasFactory<ReferenceValueFactory> */
    use HasFactory;

    protected static function newFactory(): ReferenceValueFactory
    {
        return ReferenceValueFactory::new();
    }
}
