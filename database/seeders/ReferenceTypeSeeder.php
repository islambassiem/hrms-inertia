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
                'filename' => 'qualification_research_type',
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
                'filename' => 'qualification_scientific_degree',
            ],
            [
                'name' => [
                    'ar' => 'مجال البحث',
                    'en' => 'Research Domain',
                ],
                'filename' => 'research_domain',
            ],
            [
                'name' => [
                    'ar' => 'لغة البحث',
                    'en' => 'Research Language',
                ],
                'filename' => 'research_language',
            ],
            [
                'name' => [
                    'ar' => 'طبيعة البحث',
                    'en' => 'Research Nature',
                ],
                'filename' => 'research_nature',
            ],
            [
                'name' => [
                    'ar' => 'مخرج البحث',
                    'en' => 'Research Output',
                ],
                'filename' => 'research_output',
            ],
            [
                'name' => [
                    'ar' => 'انجاز البحث',
                    'en' => 'Research Progress',
                ],
                'filename' => 'research_progress',
            ],
            [
                'name' => [
                    'ar' => 'حالة البحث',
                    'en' => 'Research Status',
                ],
                'filename' => 'research_status',
            ],
            [
                'name' => [
                    'ar' => 'نوع البحث',
                    'en' => 'Research Type',
                ],
                'filename' => 'research_type',
            ],
            [
                'name' => [
<<<<<<< HEAD
                    'ar' => 'سير العمل',
                    'en' => 'Workflow',
                ],
                'filename' => 'workflow',
=======
                    'ar' => 'نوع الاجازة',
                    'en' => 'Leave Type',
                ],
                'filename' => 'leave_type',
>>>>>>> refs/remotes/origin/leave
            ],
        ];

        foreach ($types as $type) {
            ReferenceType::query()->create($type);
        }
    }
}
