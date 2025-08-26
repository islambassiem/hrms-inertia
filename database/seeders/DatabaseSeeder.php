<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $hr = User::factory()->create([
            'email' => 'hr@example.com',
        ]);

        Role::create(['name' => 'hr']);
        Role::create(['name' => 'head']);

        $hr->assignRole('hr');

        $this->call([
            EntitySeeder::class,
            BranchSeeder::class,
            CollegeSeeder::class,
            CountrySeeder::class,
            SponsorshipSeeder::class,
            UserSeeder::class,
            EmployeeSeeder::class,
            DepartmentSeeder::class,
            DepartmentHierarchySeeder::class,
            CategorySeeder::class,
            PositionSeeder::class,
            IdentificationSeeder::class,
            AcademicRankSeeder::class,
            DependentSeeder::class,
            SpecialtySeeder::class,
            QualificationSeeder::class,
            AchievementSeeder::class,
            CourseSeeder::class,
            ResearchSeeder::class,
            OtherExperienceSeeder::class,
            InstitutionSeeder::class,
            CitySeeder::class,
            SectionSeeder::class,
            FacultySeeder::class,
            AcademicExperienceSeeder::class,
            ExtentionSeeder::class,
        ]);

        $employees = Employee::all(['id', 'head_id']);
        foreach ($employees as $employee) {
            $employee->update([
                'head_id' => $employees->random()->id,
            ]);
        }

        $heads = Employee::whereNotNull('head_id')
            ->with('head.user')
            ->get()
            ->pluck('head.user')
            ->unique(['id'])
            ->values();
        foreach ($heads as $head) {
            $head->assignRole('head');
        }
    }
}
