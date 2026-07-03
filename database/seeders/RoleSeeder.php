<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\RoleEnum;
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

        $roles = RoleEnum::cases();

        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
            ]);
        }

        User::query()->where('name', 'admin')->firstOrFail()->assignRole(RoleEnum::ADMIN->value);
        User::query()->where('name', 'hr')->firstOrFail()->assignRole(RoleEnum::HR->value);
        User::query()->where('name', 'head')->firstOrFail()->assignRole(RoleEnum::HEAD->value);
    }
}
