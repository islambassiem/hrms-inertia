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
                'filename' => 'shared_gender',
            ],
            [
                'name' => [
                    'ar' => 'الحالة الاجتماعية',
                    'en' => 'Marital Status',
                ],
                'filename' => 'shared_marital_status',
            ],
            [
                'name' => [
                    'ar' => 'صلة القرابه',
                    'en' => 'Relationship',
                ],
                'filename' => 'dependent_relationship',
            ],
            [
                'name' => [
                    'ar' => 'الديانة',
                    'en' => 'Religion',
                ],
                'filename' => 'shared_religion',
            ],
            [
                'name' => [
                    'ar' => 'الاحتاجات الخاصة',
                    'en' => 'Special Needs',
                ],
                'filename' => 'employee_special_needs',
            ],
            [
                'name' => [
                    'ar' => 'نوع الدورة التدريبية',
                    'en' => 'Course Type',
                ],
                'filename' => 'course_type',
            ],
            [
                'name' => [
                    'ar' => 'تقدير الدرجة العلمية',
                    'en' => 'Qualification Rating',
                ],
                'filename' => 'qualification_rating',
            ],
            [
                'name' => [
                    'ar' => 'المعدل التراكمي',
                    'en' => 'GPA Type',
                ],
                'filename' => 'qualification_gpa_type',
            ],
            [
                'name' => [
                    'ar' => 'نوع الدراسة',
                    'en' => 'Study Type',
                ],
                'filename' => 'qualification_study_type',
            ],
            [
                'name' => [
                    'ar' => 'نوع البحث',
                    'en' => 'Research Types',
                ],
                'filename' => 'qualification_research_types',
            ],
            [
                'name' => [
                    'ar' => 'المستوى التعليمي الفرعي',
                    'en' => 'Educational Sublevel',
                ],
                'filename' => 'qualification_educational_sub_level',
            ],
            [
                'name' => [
                    'ar' => 'الدرجة العلمية',
                    'en' => 'Scientific Degrees',
                ],
                'filename' => 'qualification_scientific_degrees',
            ],
        ];

        foreach ($types as $type) {
            ReferenceType::query()->create($type);
        }
    }
}
