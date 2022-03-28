<?php

declare(strict_types=1);

namespace Database\Seeders;

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
            'create clients',
            'view clients',
            'edit clients',
            'delete clients',
            'create contract',
            'view contracts',
            'edit contract',
            'delete contract',
        ];

        $permissions = collect($arrayOfPermissions)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });

        Permission::insert($permissions->toArray());

        Role::create(['name' => 'receptionist'])
            ->givePermissionTo($arrayOfPermissions);

        Role::create(['name' => 'super-admin'])
            ->givePermissionTo(Permission::all());

        Role::create(['name' => 'coach'])
            ->givePermissionTo([
                'view clients',
                'view contracts',
            ]);
    }
}
