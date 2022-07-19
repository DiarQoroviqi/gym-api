<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Permissions\Permission as GymPermission;
use App\Permissions\Role as GymRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $arrayOfPermissions = [
            GymPermission::CAN_CREATE_CLIENTS,
            GymPermission::CAN_VIEW_CLIENTS,
            GymPermission::CAN_EDIT_CLIENTS,
            GymPermission::CAN_DELETE_CLIENTS,
            GymPermission::CAN_CREATE_CONTRACTS,
            GymPermission::CAN_VIEW_CONTRACTS,
            GymPermission::CAN_EDIT_CONTRACTS,
            GymPermission::CAN_DELETE_CONTRACTS,
        ];

        $permissions = collect($arrayOfPermissions)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });

        Permission::insert($permissions->toArray());

        Role::create(['name' => GymRole::RECEPTIONIST])
            ->givePermissionTo($arrayOfPermissions);

        Role::create(['name' => GymRole::SUPER_ADMIN])
            ->givePermissionTo(Permission::all());

        Role::create(['name' => GymRole::COACH])
            ->givePermissionTo([
                GymPermission::CAN_VIEW_CLIENTS,
                GymPermission::CAN_VIEW_CONTRACTS,
            ]);
    }
}
