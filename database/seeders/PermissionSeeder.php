<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

final class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = PermissionEnum::cases();

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }

        Role::createOrFirst([
            'name' => RoleEnum::ADMIN->value,
        ])->givePermissionTo(PermissionEnum::DASHBOARD_ADMIN->value);

        Role::createOrFirst([
            'name' => RoleEnum::HR->value,
        ])->givePermissionTo(PermissionEnum::DASHBOARD_HR->value);

        Role::createOrFirst([
            'name' => RoleEnum::HEAD->value,
        ])->givePermissionTo(PermissionEnum::DASHBOARD_HEAD->value);
    }
}
