<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Shared\Models\Relationship;
use Illuminate\Database\Seeder;

final class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Relationship::factory(5)->create();
    }
}
