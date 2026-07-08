<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Employee\Models\Employee;
use App\Domain\Employee\Models\EmployeeOrganizationAttribute;
use App\Domain\Organization\Models\Attribute;
use Illuminate\Database\Seeder;

final class EmployeeOrganizationAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributes = Attribute::query()->get();

        foreach ($attributes as $attribute) {
            EmployeeOrganizationAttribute::factory(100)->create([
                'employee_id' => fn () => Employee::query()->inRandomOrder()->value('id'),
                'attribute_id' => $attribute->id,
            ]);
        }

    }
}
