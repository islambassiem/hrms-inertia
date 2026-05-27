<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Shared\Models\ReferenceType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

final class ReferenceValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = File::files(database_path('lookup-values'));

        foreach ($files as $file) {
            $filename = ReferenceType::query()
                ->where('filename', $file->getFilenameWithoutExtension())
                ->firstOrFail(['id', 'filename'])
                ->toArray();

            /** @var array<int, array{
             *     code: string,
             *     name_ar: string,
             *     name_en: string,
             *     sort_order: int,
             * }> $values
             */
            $values = json_decode(File::get($file->getRealPath()), true);

            foreach ($values as $value) {
                DB::table('shared_reference_values')->insert([
                    'name_ar' => $value['name_ar'],
                    'name_en' => $value['name_en'],
                    'code' => $value['code'],
                    'sort_order' => $value['sort_order'],
                    'reference_type_id' => $filename['id'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
