<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        $permissionNames = $this->initializeAllPermissionsWithReturn();

        $this->createSuperAdmin($permissionNames); // Give the Strategy Manager all permissions.

    }

    public function initializeAllPermissionsWithReturn(): array
    {
        $permissions = [
        
        ];

        $this->createPermissionsFromListOfNames($permissions);

        return $permissions;
    }

    public function createSuperAdmin(array $permissionNames): void
    {
        // Create roles and assign created permissions
        $superAdminRole = $this->createRole(Role::SUPER_ADMIN, 'مدير النظام', 'super_admin');

        foreach ($permissionNames as $permissionName) {
            $permission = Permission::findByName($permissionName, 'web');
            $superAdminRole->givePermissionTo($permission);
        }
    }


    public function createPermissionsFromListOfNames(array $permissionNames): void
    {
        $permissions = collect($permissionNames)->map(function ($permission) {

            return ['name' => $permission, 'guard_name' => 'web'];
        });

        Permission::insertOrIgnore($permissions->toArray());
    }

    public function createRole(int $id, string $role_name, string $name): Role|\Spatie\Permission\Models\Role
    {
        $role = Role::firstOrCreate(
            ['id' => $id],
            ['role_name' => $role_name, 'name' => $name]
        );

        return $role;
    }
}
