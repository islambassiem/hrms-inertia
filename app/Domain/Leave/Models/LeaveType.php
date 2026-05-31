<?php

declare(strict_types=1);

namespace App\Domain\Leave\Models;

use App\Concerns\UserStamp;
use App\Domain\Leave\Models\Scopes\LeaveTypeScope;
use Database\Factories\LeaveTypeFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

#[Fillable([
    'name',
    'code',
    'created_by',
    'updated_by',
])]
#[Table('shared_reference_values')]
#[ScopedBy(LeaveTypeScope::class)]
final class LeaveType extends Model
{
    /** @use HasFactory<LeaveTypeFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<LeaveType> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    protected static function newFactory(): LeaveTypeFactory
    {
        return LeaveTypeFactory::new();
    }
}
