<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Leave\Models\CompensationEntry;
use App\Domain\Leave\Models\LeaveRequest;
use Illuminate\Database\Seeder;

final class LeaveCompensationEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompensationEntry::factory(500)->create([
            'leave_request_id' => fn () => LeaveRequest::query()->inRandomOrder()->value('id'),
        ]);
    }
}
