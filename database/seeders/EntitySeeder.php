<?php

namespace Database\Seeders;

use App\Models\Entity;
use Illuminate\Database\Seeder;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Entity::factory()
            ->create([
                'code' => 'INY',
                'entity_en' => 'Inaya Medical Colleges',
                'entity_ar' => 'كليات العناية الطبية',
                'created_by' => 1,
            ]);

        Entity::factory()->create([
            'code' => 'SHDC',
            'entity_en' => 'Shining Horizon Dental College',
            'entity_ar' => 'مجمع الآفاق لطب الأسنان',
            'created_by' => 1,
        ]);

        Entity::factory()->create([
            'code' => 'INYCLN',
            'entity_en' => 'Inaya Cleaning',
            'entity_ar' => 'العناية للنظافة',
            'created_by' => 1,
        ]);
    }
}
