<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Employee\Models\Employee;
use App\Domain\Identity\Models\Identity;
use App\Domain\Identity\Models\IdentityType;
use Illuminate\Database\Seeder;

final class IdentitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Identity::factory(500)->create([
            'employee_id' => fn () => Employee::query()->inRandomOrder()->value('id'),
            'identity_type_id' => fn () => IdentityType::query()->inRandomOrder()->value('id'),
        ]);
    }
}
