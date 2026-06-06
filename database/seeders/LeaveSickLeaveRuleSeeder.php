<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Leave\Models\SickLeaveRule;
use Illuminate\Database\Seeder;

final class LeaveSickLeaveRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SickLeaveRule::factory(5)->create();
    }
}
