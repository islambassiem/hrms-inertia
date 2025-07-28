<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'test@example.com',
        ]);

        $this->call([
            EntitySeeder::class,
            BranchSeeder::class,
            CollegeSeeder::class,
            DepartmentSeeder::class,
            DepartmentHierarchySeeder::class,
            CountrySeeder::class,
            SponsorshipSeeder::class,
            EmployeeSeeder::class,
        ]);

        $employees = Employee::all(['id', 'head_id']);
        foreach ($employees as $employee) {
            $employee->update([
                'head_id' => $employees->random()->id,
            ]);
        }
    }
}
