<?php

declare(strict_types=1);

namespace App\Domain\Achievement\Models;

use App\Concerns\UserStamp;
use Database\Factories\AchievementFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'employee_id',
    'achievement_title',
    'achievement_year',
    'created_by',
    'updated_by',
])]
#[Table('achievement_achievements')]
final class Achievement extends Model
{
    /** @use HasFactory<AchievementFactory> */
    use HasFactory;

    /** @use UserStamp<Achievement> */
    use UserStamp;

    protected static function newFactory(): AchievementFactory
    {
        return AchievementFactory::new();
    }
}
