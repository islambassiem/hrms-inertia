<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

final class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roles = [
            'admin',
            'hr',
            'head',
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
            ]);
        }

        User::query()->where('name', 'admin')->firstOrFail()->assignRole('admin');
        User::query()->where('name', 'hr')->firstOrFail()->assignRole('hr');
        User::query()->where('name', 'head')->firstOrFail()->assignRole('head');
    }
}
