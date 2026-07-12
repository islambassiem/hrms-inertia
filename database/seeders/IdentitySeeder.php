<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Employee\Models\Employee;
use App\Domain\Identity\Enums\IdentityEnum;
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
        $employees = Employee::all();

        foreach ($employees as $employee) {
            Identity::factory()->create([
                'employee_id' => $employee->id,
                'identity_type_id' => IdentityEnum::NATIONAL_IDENTITY->value,
            ]);
        }

        Identity::factory(200)->create([
            'employee_id' => fn () => Employee::query()->inRandomOrder()->value('id'),
            'identity_type_id' => fn () => IdentityType::query()->inRandomOrder()->value('id'),
        ]);
    }
}
