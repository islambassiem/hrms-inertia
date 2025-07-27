<?php

namespace Database\Seeders;

use App\Models\College;
use Illuminate\Database\Seeder;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        College::create([
            'branch_id' => 1,
            'code' => 'AMS',
            'college_en' => 'College of Applied Medical Sciences',
            'college_ar' => 'كلية العلوم الطبية التطبيقية',
            'created_by' => 1,
        ]);

        College::create([
            'branch_id' => 1,
            'code' => 'HIS',
            'college_en' => 'College of Health Information Systems',
            'college_ar' => 'كلية نظم المعلومات الصحية',
            'created_by' => 1,
        ]);

        College::create([
            'branch_id' => 1,
            'code' => 'NUR',
            'college_en' => 'College of Nursing Sciences',
            'college_ar' => 'كلية التمريض',
            'created_by' => 1,
        ]);
    }
}
