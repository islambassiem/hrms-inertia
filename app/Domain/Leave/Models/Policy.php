<?php

declare(strict_types=1);

namespace App\Domain\Leave\Models;

use App\Concerns\UserStamp;
use Database\Factories\LeavePolicyFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

#[Fillable([
    'leave_type_id',
    'name',
    'is_default',
    'days_per_year',
    'accrual_frequency',
    'max_carry_forward',
    'carry_forward_expiry_months',
    'created_by',
    'updated_by',
])]
#[Table('leave_policies')]
final class Policy extends Model
{
    /** @use HasFactory<LeavePolicyFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<LeaveType> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    protected static function newFactory(): LeavePolicyFactory
    {
        return LeavePolicyFactory::new();
    }
}
