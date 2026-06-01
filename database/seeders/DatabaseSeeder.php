<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            ReferenceTypeSeeder::class,
            ReferenceValueSeeder::class,
            CountrySeeder::class,
            DepartmentSeeder::class,
            EmployeeCategorySeeder::class,
            EmployeeSeeder::class,
            IdentityTypeSeeder::class,
            IdentitySeeder::class,
            AddressSeeder::class,
            OrganizationAttributeTypeSeeder::class,
            OrganizationAttributeSeeder::class,
            EmployeeOrganizationAttributeSeeder::class,
            DependentSeeder::class,
            ExperienceSeeder::class,
            CourseSeeder::class,
            AchievementSeeder::class,
            QualificationSpecialtyCategorySeeder::class,
            QualificationSpecialtySeeder::class,
            QualificationIncludedSpecialtySeeder::class,
            QualificationsSeeder::class,
            ResearchSeeder::class,
<<<<<<< HEAD
            WorkflowStepSeeder::class,
            WorkflowApprovalSeeder::class,
=======
            LeaveRequestSeeder::class,
            LeaveTransactionSeeder::class,
            LeaveCompensationEntrySeeder::class,
            LeaveBalanceSeeder::class,
            LeavePolicySeeder::class,
>>>>>>> refs/remotes/origin/leave
        ]);
    }
}
