<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Employee\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

final class EmployeeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => [
                    'ar' => 'عضو هيئة التدريس',
                    'en' => 'Faculty Staff',
                ],
                'parent_id' => null,
                'code' => Str::random(),
            ],
            [
                'name' => [
                    'ar' => 'الموظفين الإداريين',
                    'en' => 'Administrative Staff',
                ],
                'parent_id' => null,
                'code' => Str::random(),
            ],
            [
                'name' => [
                    'ar' => 'السائقين',
                    'en' => 'Driver',
                ],
                'parent_id' => null,
                'code' => Str::random(),
            ],
            [
                'name' => [
                    'ar' => 'موظفي النظافة',
                    'en' => 'Cleaning Staff',
                ],
                'parent_id' => null,
                'code' => Str::random(),
            ],
            [
                'name' => [
                    'ar' => 'صيانة',
                    'en' => 'Maintenance',
                ],
                'parent_id' => null,
                'code' => Str::random(),
            ],
            [
                'name' => [
                    'ar' => 'استشاريين',
                    'en' => 'Consultants',
                ],
                'parent_id' => null,
                'code' => Str::random(),
            ],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }

        $categories = Category::all();
        foreach ($categories as $category) {
            $parent = $categories->where('id', '!=', $category->id)->random();
            $category->update([
                'parent_id' => $parent->id,
            ]);
        }
    }
}
