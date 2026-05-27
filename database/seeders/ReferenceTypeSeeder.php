<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Shared\Models\ReferenceType;
use Illuminate\Database\Seeder;

final class ReferenceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => [
                    'ar' => 'الجنس',
                    'en' => 'Gender',
                ],
                'filename' => 'gender',
            ],
            [
                'name' => [
                    'ar' => 'الحالة الاجتماعية',
                    'en' => 'Marital Status',
                ],
                'filename' => 'marital_status',
            ],
            [
                'name' => [
                    'ar' => 'صلة القرابه',
                    'en' => 'Relationship',
                ],
                'filename' => 'releationship',
            ],
            [
                'name' => [
                    'ar' => 'الديانة',
                    'en' => 'Religion',
                ],
                'filename' => 'religion',
            ],
            [
                'name' => [
                    'ar' => 'الاحتاجات الخاصة',
                    'en' => 'Special Needs',
                ],
                'filename' => 'special_needs',
            ],
        ];

        foreach ($types as $type) {
            ReferenceType::query()->create($type);
        }
    }
}
