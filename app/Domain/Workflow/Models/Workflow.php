<?php

declare(strict_types=1);

namespace App\Domain\Workflow\Models;

use App\Concerns\UserStamp;
use App\Domain\Workflow\Models\Scopes\WorkflowScope;
use Database\Factories\WorkflowFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

#[Fillable([
    'name',
    'description',
    'code',
])]
#[Table('shared_reference_values')]
#[ScopedBy(WorkflowScope::class)]
final class Workflow extends Model
{
    /** @use HasFactory<WorkflowFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<Workflow> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    public function casts(): array
    {
        return [
            'name' => 'array',
        ];
    }

    protected static function newFactory(): WorkflowFactory
    {
        return WorkflowFactory::new();
    }
}
