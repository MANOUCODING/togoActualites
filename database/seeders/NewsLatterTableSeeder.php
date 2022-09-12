<?php

namespace Database\Seeders;

use App\Models\NewsLatter;
use Illuminate\Database\Seeder;

class NewsLatterTableSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['email' => 'manouadjanor@gmail.com'], // 0
            ['email' => 'th.manoudev@gmail.com'], // 1
            ['email' => 'th.manoudevO1@gmail.com'], // 2
        ];

        foreach ($datas as $data){
            NewsLatter::create($data);
        }
    }
}
