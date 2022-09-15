<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        
        $this->call(RoleTableSeeder::class);

        $this->call(AdministrateurTableSeeder::class);

        $this->call(UtilisateurTableSeeder::class);

        $this->call(NewsLatterTableSeeder::class);

        $this->call(CategoryTableSeeder::class);
    }
}
