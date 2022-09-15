<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['categoryName' => 'A Ne Pas Rater Togo', 'slug' => Hash::make('A Ne Pas Rater Togo') ], // 0
            ['categoryName' => 'Actualités', 'slug' => Hash::make('Actualités') ], // 1
            ['categoryName' => 'AFRIQUE', 'slug' => Hash::make('AFRIQUE') ], // 2
            ['categoryName' => 'CAN', 'slug' => Hash::make('CAN') ], // 3
            ['categoryName' => 'CHRONIQUES', 'slug' => Hash::make('CHRONIQUES') ], // 4
            ['categoryName' => 'Communiqué', 'slug' => Hash::make('Communiqué') ], // 5
            ['categoryName' => 'COOPÉRATION', 'slug' => Hash::make('COOPÉRATION') ], // 6
            ['categoryName' => 'CULTURE', 'slug' => Hash::make('CULTURE') ], // 7
            ['categoryName' => 'DIASPORA', 'slug' => Hash::make('DIASPORA') ], // 8
            ['categoryName' => 'Diplomatie', 'slug' => Hash::make('Diplomatie') ], // 9
            ['categoryName' => 'ECONOMIE', 'slug' => Hash::make('ECONOMIE') ], // 10
            ['categoryName' => 'Editorial', 'slug' => Hash::make('Editorial') ], // 11
            ['categoryName' => 'EDUCATION', 'slug' => Hash::make('EDUCATION') ], // 11
            ['categoryName' => 'FAITS DIVERS', 'slug' => Hash::make('FAITS DIVERS') ], // 11
            ['categoryName' => 'FENETRE SUR L\'AFRIQUE', 'slug' => Hash::make('FENETRE SUR L\'AFRIQUE') ], // 11
            ['categoryName' => 'HIGH TECH', 'slug' => Hash::make('HIGH TECH') ], // 11
            ['categoryName' => 'IMPORTANT', 'slug' => Hash::make('IMPORTANT') ], // 11
            ['categoryName' => 'INTERNATIONAL', 'slug' => Hash::make('INTERNATIONAL') ], // 11
            ['categoryName' => 'Interview', 'slug' => Hash::make('Interview') ], // 11
            ['categoryName' => 'JUSTICE', 'slug' => Hash::make('JUSTICE') ], // 11
            ['categoryName' => 'MEDIA', 'slug' => Hash::make('MEDIA') ], // 11
            ['categoryName' => 'MONDE', 'slug' => Hash::make('MONDE') ], // 11
            ['categoryName' => 'NÉCROLOGIE', 'slug' => Hash::make('NÉCROLOGIE') ], // 11
            ['categoryName' => 'OPINION', 'slug' => Hash::make('OPINION') ], // 11
            ['categoryName' => 'POLITIQUE', 'slug' => Hash::make('POLITIQUE') ], // 11
            ['categoryName' => 'Rubriques+', 'slug' => Hash::make('Rubriques+') ], // 11
            ['categoryName' => 'SANTE', 'slug' => Hash::make('SANTE') ], // 11
            ['categoryName' => 'SOCIÉTÉ', 'slug' => Hash::make('SOCIÉTÉ') ], // 11
            ['categoryName' => 'SPORT', 'slug' => Hash::make('SPORT') ], // 11
            ['categoryName' => 'TOGO', 'slug' => Hash::make('TOGO') ], // 11
            ['categoryName' => 'TOGO ACTUALITÉ', 'slug' => Hash::make('TOGO ACTUALITÉ') ], // 11
            ['categoryName' => 'Vidéos', 'slug' => Hash::make('Vidéos') ], // 11
            ['categoryName' => 'CULTURE', 'slug' => Hash::make('CULTURE') ], // 11
            ['categoryName' => 'CULTURE', 'slug' => Hash::make('CULTURE') ], // 11
            
        ];

        foreach ($datas as $data){
            Category::create($data);
        }
    }
}
