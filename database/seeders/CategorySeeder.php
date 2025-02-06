<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Urbanisme',
                'emoji' => '🏙️',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sécurité',
                'emoji' => '🛡️',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Environnement',
                'emoji' => '🌿',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
