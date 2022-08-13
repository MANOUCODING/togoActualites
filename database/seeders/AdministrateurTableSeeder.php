<?php

namespace Database\Seeders;

use App\Models\Administrateur;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdministrateurTableSeeder extends Seeder
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
                'role_id' => 1,
                'user_id' => 1,
            ],

            'users' => [
                'email' => 'superadmin@togoactualite.com',
                'email_verified_at' => now(),
                'telephone' => '0022870046628',
                'role_id' => 1,
                'password' => Hash::make('admin1234'), // password
                'remember_token' => Str::random(10),
            ],

        ];

        $static_datas_admins =[

            'admin' => [
                'nomComplet' => 'Joël DENANYO',
                'role_id' => 2,
                'user_id' => 2,
            ],

            'users' => [
                'email' => 'publicateurarticle@togoactualite.com',
                'email_verified_at' => now(),
                'telephone' => '0022891386574',
                'role_id' => 2,
                'password' => Hash::make('password1234'), // password12
                'remember_token' => Str::random(10),
            ],

        ];

        User::create($static_datas_super_admins['users']);

        Administrateur::create($static_datas_super_admins['admin']);

        User::create($static_datas_admins['users']);

        Administrateur::create($static_datas_admins['admin']);
    }
}
