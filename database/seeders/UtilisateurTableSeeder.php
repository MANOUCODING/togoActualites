<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UtilisateurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $static_datas_super_admins =[

            'admin' => [
                'nomComplet' => 'Alexandre DENANYO',
                'role_id' => 3,
                'user_id' => 3,
            ],

            'users' => [
                'email' => 'user01@togoactualite.com',
                'email_verified_at' => now(),
                'telephone' => '0022870046604',
                'role_id' => 3,
                'password' => Hash::make('SuperAdmin@12349'), // password
                'remember_token' => Str::random(10),
            ],

        ];

        $static_datas_admins =[

            'admin' => [
                'nomComplet' => 'Joël DENANYO',
                'role_id' => 3,
                'user_id' => 4,
            ],

            'users' => [
                'email' => 'userO2@togoactualite.com',
                'email_verified_at' => now(),
                'telephone' => '0022891386506',
                'role_id' => 3,
                'password' => Hash::make('password12347'), // password12
                'remember_token' => Str::random(10),
            ],

        ];

        User::create($static_datas_super_admins['users']);

        Utilisateur::create($static_datas_super_admins['admin']);

        User::create($static_datas_admins['users']);

        Utilisateur::create($static_datas_admins['admin']);
    }
}
