<?php

namespace App\Domain\Leave\Models;

use App\Concerns\UserStamp;
use Database\Factories\LeaveTypeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class LeaveType extends Model
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
