<?php
// filepath: /c:/UniServerZ/www/MairieApp/database/seeders/RoleSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Créer des rôles
        $adminRole = Role::create(['name' => 'admin']);
        $employeRole = Role::create(['name' => 'employe']);

        // Créer des permissions
        Permission::create(['name' => 'manage categories']);
        Permission::create(['name' => 'manage arretes']);
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'view dashboard']);

        // Assigner des permissions aux rôles
        $adminRole->givePermissionTo(['manage categories', 'manage arretes', 'manage users', 'view dashboard']);
        $employeRole->givePermissionTo(['manage categories', 'manage arretes']);
    }
}