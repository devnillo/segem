<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]
            ->forgetCachedPermissions();

        $permissions = [
            'view dashboard',

            'manage departments',
            'manage schools',
            'manage users',

            'view reports',
            'export data',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $secretary = Role::firstOrCreate(['name' => 'education-secretary']);
        $school = Role::firstOrCreate(['name' => 'school-admin']);

        $admin->givePermissionTo(Permission::all());

        $secretary->givePermissionTo([
            'view dashboard',
            'manage departments',
            'manage schools',
            'view reports',
        ]);

        $school->givePermissionTo([
            'view dashboard',
            'manage schools',
        ]);
    }
}
