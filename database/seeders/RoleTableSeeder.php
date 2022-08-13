<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['name' => 'SUPER ADMINISTRATEUR'], // 0
            ['name' => 'PUBLICATEUR ARTICLE'], // 1
            ['name' => 'UTILISATEUR'], // 2
        ];

        foreach ($datas as $data){
            Role::create($data);
        }
    }
}
