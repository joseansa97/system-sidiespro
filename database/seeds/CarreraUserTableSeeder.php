<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarreraUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carreraUser = [
            array('carrera_id' => '5', 'user_id' => '1'),
            array('carrera_id' => '4', 'user_id' => '3'),
            array('carrera_id' => '3', 'user_id' => '2'),
            array('carrera_id' => '2', 'user_id' => '2'),
            array('carrera_id' => '1', 'user_id' => '1')
        ];

        DB::table('carrera_user')->insert($carreraUser);

        /*DB::table('carrera_user')->insert([
            'carrera_id' => '5',
            'user_id' => '1',
        ]);
        DB::table('carrera_user')->insert([
            'carrera_id' => '4',
            'user_id' => '3',
        ]);
        DB::table('carrera_user')->insert([
            'carrera_id' => '3',
            'user_id' => '2',
        ]);
        DB::table('carrera_user')->insert([
            'carrera_id' => '2',
            'user_id' => '2',
        ]);
        DB::table('carrera_user')->insert([
            'carrera_id' => '1',
            'user_id' => '1',
        ]);*/

    }
}
