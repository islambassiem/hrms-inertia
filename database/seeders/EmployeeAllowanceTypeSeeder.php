<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Employee\Models\AllowanceType;
use Illuminate\Database\Seeder;

final class EmployeeAllowanceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allowances = [
            [
                'name' => [
                    'ar' => 'بدل سكن',
                    'en' => 'Housing',
                ],
                'code' => 'HOS',
            ],
            [
                'name' => [
                    'ar' => 'بدل مواصلات',
                    'en' => 'Transportation',
                ],
                'code' => 'Trans',
            ],
            [
                'name' => [
                    'ar' => 'بدل طعام',
                    'en' => 'Food',
                ],
                'code' => 'FOOD',
            ],
            [
                'name' => [
                    'ar' => 'بدل تذاكر',
                    'en' => 'Ticket',
                ],
                'code' => 'TKT',
            ],
        ];

        foreach ($allowances as $allowance) {
            AllowanceType::query()->create($allowance);
        }
    }
}
