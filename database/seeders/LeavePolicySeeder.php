<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Leave\Models\LeaveType;
use App\Domain\Leave\Models\Policy;
use Illuminate\Database\Seeder;

final class LeavePolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = LeaveType::all();
        foreach ($types as $type) {
            Policy::factory()->create([
                'leave_type_id' => $type->id,
            ]);
        }
    }
}
