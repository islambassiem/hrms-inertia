<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Dependent\Models\Dependent;
use App\Domain\Employee\Models\Employee;
use App\Domain\Shared\Models\Gender;
use App\Domain\Shared\Models\Relationship;
use Illuminate\Database\Seeder;

final class DependentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dependent::factory(100)->create([
            'employee_id' => fn () => Employee::query()->inRandomOrder()->value('id'),
            'gender_id' => fn () => Gender::query()->inRandomOrder()->value('id'),
            'relationship_id' => fn () => Relationship::query()->inRandomOrder()->value('id'),
        ]);
    }
}
