<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder {
    public function run(): void {
        // PERMISSIONS
        $permissions = [
            'dashboard.view', 'students.view', 'students.create', 'students.edit', 'students.delete',
            'users.view', 'users.create', 'users.edit', 'users.delete', 'roles.view'
        ];
        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // ROLES
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin']);
        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $teacher = Role::firstOrCreate(['name' => 'Teacher']);

        $superAdmin->givePermissionTo(Permission::all());
        $admin->givePermissionTo(['dashboard.view','students.view','students.create','students.edit','students.delete','users.view','users.create','users.edit']);
        $teacher->givePermissionTo(['dashboard.view','students.view']);
    }
}
