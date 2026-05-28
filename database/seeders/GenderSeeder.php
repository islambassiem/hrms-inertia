<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Shared\Enums\ReferenceType;
use App\Domain\Shared\Models\Gender;
use Illuminate\Database\Seeder;

final class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gender::query()->create([
            'name_en' => 'Male',
            'name_ar' => 'ذكر',
            'reference_type_id' => ReferenceType::GENDER,
            'code' => '1',
        ]);

        Gender::query()->create([
            'name_en' => 'Female',
            'name_ar' => 'انثى',
            'reference_type_id' => ReferenceType::GENDER,
            'code' => '2',
        ]);
    }
}
