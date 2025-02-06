<?php
// filepath: /c:/UniServerZ/www/MairieApp/database/seeders/AssignPermissionsToRolesSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AssignPermissionsToRolesSeeder extends Seeder
{
    public function run()
    {
        // Trouver les rôles
        $adminRole = Role::where('name', 'admin')->first();
        $employeRole = Role::where('name', 'employe')->first();

        // Assigner des permissions aux rôles
        $adminRole->givePermissionTo(Permission::all());
        $employeRole->givePermissionTo(['manage categories', 'manage arretes']);
    }
}