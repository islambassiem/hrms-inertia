<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Employee\Models\Category;
use Illuminate\Database\Seeder;

final class EmployeeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::factory(10)->create();

        foreach ($categories as $category) {
            $parent = $categories->where('id', '!=', $category->id)->random();
            $category->update([
                'parent_id' => $parent->id,
            ]);
        }
    }
}
