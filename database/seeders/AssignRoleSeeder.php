<?php
// filepath: /c:/UniServerZ/www/MairieApp/database/seeders/AssignRoleSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AssignRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assigner le rôle admin à un utilisateur spécifique
        $adminUser = User::find(7); // Remplacez par l'ID de votre utilisateur admin
        if ($adminUser) {
            $adminUser->assignRole('admin');
        }

        // Assigner le rôle employe à un autre utilisateur spécifique
        $employeUser = User::find(6); // Remplacez par l'ID de votre utilisateur employé
        if ($employeUser) {
            $employeUser->assignRole('employe');
        }
    }
}