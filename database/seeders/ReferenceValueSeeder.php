<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Shared\Enums\ReferenceType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

final class ReferenceValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ReferenceType::cases();

        foreach ($types as $type) {
            $filename = Str::lower($type->name).'.json';
            $fileContent = File::get(database_path('lookup-values/'.$filename));

            /** @var array<int, array{
             *     code: string,
             *     name: array{en: string, ar: string},
             *     sort_order: int,
             * }> $values
             */
            $values = json_decode($fileContent, true);

            foreach ($values as $value) {
                DB::table('shared_reference_values')->insert([
                    'name' => json_encode($value['name'], JSON_UNESCAPED_UNICODE),
                    'code' => $value['code'],
                    'sort_order' => $value['sort_order'],
                    'reference_type_id' => $type->value,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
