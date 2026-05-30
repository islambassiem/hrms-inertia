<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Organization\Models\Attribute;
use App\Domain\Organization\Models\AttributeType;
use Illuminate\Database\Seeder;

final class OrganizationAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attribute::factory(50)->create([
            'type_id' => AttributeType::query()->inRandomOrder()->value('id'),
        ]);
    }
}
