<?php

declare(strict_types=1);

namespace App\Domain\Shared\Models;

use Database\Factories\ReferenceValueFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

#[Fillable([
    'name',
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

    use HasTranslations;

    /** @var array<string> */
    public array $translatable = ['name'];

    public function casts(): array
    {
        return [
            'name' => 'array',
        ];
    }

    protected static function newFactory(): ReferenceValueFactory
    {
        return ReferenceValueFactory::new();
    }
}
