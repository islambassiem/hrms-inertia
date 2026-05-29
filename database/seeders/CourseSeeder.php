<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Course\Models\Course;
use App\Domain\Course\Models\Type;
use App\Domain\Employee\Models\Employee;
use App\Domain\Shared\Models\Country;
use Illuminate\Database\Seeder;

final class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory(30)->create([
            'employee_id' => fn () => Employee::query()->inRandomOrder()->value('id'),
            'type_id' => fn () => Type::query()->inRandomOrder()->value('id'),
            'country_id' => fn () => Country::query()->inRandomOrder()->value('id'),
        ]);
    }
}
