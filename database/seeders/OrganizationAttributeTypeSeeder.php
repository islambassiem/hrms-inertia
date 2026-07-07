<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Organization\Models\AttributeType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

final class OrganizationAttributeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => [
                    'ar' => 'الكفالة',
                    'en' => 'Sponsorship',
                ],
                'code' => Str::random(),
            ],
            [
                'name' => [
                    'ar' => 'المسمى الوظيفي',
                    'en' => 'Job Title',
                ],
                'code' => Str::random(),
            ],
            [
                'name' => [
                    'ar' => 'المنصب',
                    'en' => 'Position',
                ],
                'code' => Str::random(),
            ],
            [
                'name' => [
                    'ar' => 'الرتبة الاكاديمية',
                    'en' => 'Academic Rank',
                ],
                'code' => Str::random(),
            ],
            [
                'name' => [
                    'ar' => 'الرتبة الادارية',
                    'en' => 'Admin Rank',
                ],
                'code' => Str::random(),
            ],
            [
                'name' => [
                    'ar' => 'الوحدة',
                    'en' => 'Unit',
                ],
                'code' => Str::random(),
            ],
            [
                'name' => [
                    'ar' => 'الفريق',
                    'en' => 'Team',
                ],
                'code' => Str::random(),
            ],
        ];

        foreach ($types as $type) {
            AttributeType::query()->create($type);
        }

    }
}
