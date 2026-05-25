<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Course\Models\CourseType;
use Illuminate\Database\Seeder;

final class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => [
                    'ar' => 'تدريب',
                    'en' => 'Training',
                ],
                'code' => '1',
            ],
            [
                'name' => [
                    'ar' => 'شهادة',
                    'en' => 'Certificate',
                ],
                'code' => '2',
            ],
            [
                'name' => [
                    'ar' => 'ورشة عمل',
                    'en' => 'Workshop',
                ],
                'code' => '3',
            ],
            [
                'name' => [
                    'ar' => 'ندوة',
                    'en' => 'Symposium',
                ],
                'code' => '4',
            ],
            [
                'name' => [
                    'ar' => 'اخرى',
                    'en' => 'Other',
                ],
                'code' => '5',
            ],
        ];
        foreach ($types as $type) {
            CourseType::query()->create($type);
        }
    }
}
