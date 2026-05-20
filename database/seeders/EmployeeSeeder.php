<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Employee\Models\Category;
use App\Domain\Employee\Models\Employee;
use App\Domain\Employee\Models\Sponsorship;
use App\Domain\Organization\Enums\DepartmentType;
use App\Domain\Organization\Models\Department;
use App\Domain\Shared\Models\Country;
use App\Domain\Shared\Models\Gender;
use App\Domain\Shared\Models\MaritalStatus;
use App\Domain\Shared\Models\Religion;
use App\Domain\Shared\Models\SpecialNeeds;
use App\Models\User;
use Illuminate\Database\Seeder;

final class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(300)->create();

        foreach ($users as $user) {
            Employee::factory()->create([
                'user_id' => $user->id,
                'marital_status_id' => fn () => MaritalStatus::query()->inRandomOrder()->value('id'),
                'religion_id' => fn () => Religion::query()->inRandomOrder()->value('id'),
                'special_needs_id' => fn () => SpecialNeeds::query()->inRandomOrder()->value('id'),
                'gender_id' => fn () => Gender::query()->inRandomOrder()->value('id'),
                'sponsorship_id' => fn () => Sponsorship::query()->inRandomOrder()->value('id'),
                'category_id' => fn () => Category::query()->inRandomOrder()->value('id'),
                'department_id' => fn () => Department::query()->where('type', DepartmentType::DEPARTMENT)->firstOrFail()->inRandomOrder()->value('id'),
                'nationality_id' => fn () => Country::query()->inRandomOrder()->value('id'),
                'place_of_birth' => fn () => Country::query()->inRandomOrder()->value('id'),
            ]);
        }

        $employees = Employee::all();

        foreach ($employees as $employee) {
            /** @var Employee $head */
            $head = $employees->random();
            $employee->update([
                'head_id' => $head->id,
            ]);
        }
    }
}
