<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Identity\Enums\IdentityEnum;
use App\Domain\Identity\Models\IdentityType;
use Illuminate\Database\Seeder;

final class IdentityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => [
                    'ar' => 'الهوية الوطنية',
                    'en' => 'National ID',
                ],
                'code' => IdentityEnum::NATIONAL_IDENTITY->value,
            ],
            [
                'name' => [
                    'ar' => 'جواز السفر',
                    'en' => 'Passport',
                ],
                'code' => IdentityEnum::PASSPORT->value,
            ],
            [
                'name' => [
                    'ar' => 'رخصة القيادة',
                    'en' => 'Driving License',
                ],
                'code' => '3',
            ],
            [
                'name' => [
                    'ar' => 'بطاقة الهوية العسكرية',
                    'en' => 'Military ID Card',
                ],
                'code' => '4',
            ],
            [
                'name' => [
                    'ar' => 'بطاقة الهوية المدنية',
                    'en' => 'Civil ID Card',
                ],
                'code' => '5',
            ],
            [
                'name' => [
                    'ar' => 'بطاقة الهوية الطلابية',
                    'en' => 'Student ID Card',
                ],
                'code' => '6',
            ],
            [
                'name' => [
                    'ar' => 'بطاقة الهوية الصحية',
                    'en' => 'Health ID Card',
                ],
                'code' => '7',
            ],
        ];

        foreach ($types as $type) {
            IdentityType::query()->create($type);
        }
    }
}
