<?php

declare(strict_types=1);

namespace App\Domain\Workflow\Models;

use App\Domain\Workflow\Enums\WorkflowStatus;
use Database\Factories\WorkflowApprovalFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'approveable_type',
    'approveable_id',
    'approver_id',
    'role_id',
    'status',
    'comment',
])]
#[Table('workflow_approvals')]
final class Approval extends Model
{
    /** @use HasFactory<WorkflowApprovalFactory> */
    use HasFactory;

    public function casts()
    {
        return [
            'status' => WorkflowStatus::class,
        ];
    }

    protected static function newFactory(): WorkflowApprovalFactory
    {
        return WorkflowApprovalFactory::new();
    }
}
