<?php

declare(strict_types=1);

namespace App\Domain\Workflow\Models;

use App\Concerns\UserStamp;
use Database\Factories\WorkflowStepFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

#[Fillable([
    'workflow_id',
    'name',
    'description',
    'step_order',
    'role_id',
    'created_by',
    'updated_by',
])]
#[Table('workflow_steps')]
final class Step extends Model
{
    /** @use HasFactory<WorkflowStepFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<Workflow> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name', 'description'];

    public function casts(): array
    {
        return [
            'name' => 'array',
            'description' => 'array',
        ];
    }

    protected static function newFactory(): WorkflowStepFactory
    {
        return WorkflowStepFactory::new();
    }
}
