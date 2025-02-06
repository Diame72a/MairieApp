<?php
// filepath: /c:/UniServerZ/www/MairieApp/database/seeders/PermissionSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'view categories',
            'edit categories',
            'delete categories',
            'view arretes',
            'edit arretes',
            'delete arretes',
            'view users',
            'edit users',
            'delete users',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}