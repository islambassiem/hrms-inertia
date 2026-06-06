<?php

declare(strict_types=1);

namespace App\Domain\Leave\Models;

use App\Concerns\UserStamp;
use Database\Factories\LeaveSickLeaveRuleFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name',
    'no_of_days',
    'pay_rate',
    'effective_from',
    'created_by',
    'updated_by',
])]
#[Table('leave_sick_leave_rules')]
final class SickLeaveRule extends Model
{
    /** @use HasFactory<LeaveSickLeaveRuleFactory> */
    use HasFactory;

    /** @use UserStamp<SickLeaveRule> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    public function casts(): array
    {
        return [
            'name' => 'array',
            'effective_from' => 'immutable_date',
        ];
    }

    protected static function newFactory(): LeaveSickLeaveRuleFactory
    {
        return LeaveSickLeaveRuleFactory::new();
    }
}
