<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Employee\Models\Employee;
use App\Domain\Experience\Models\Experience;
use App\Domain\Shared\Models\Country;
use Illuminate\Database\Seeder;

final class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Experience::factory(150)->create([
            'employee_id' => fn () => Employee::query()->inRandomOrder()->value('id'),
            'country_id' => fn () => Country::query()->inRandomOrder()->value('id'),
        ]);
    }
}
