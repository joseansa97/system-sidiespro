<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResidenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $residencia = [
            array('name' => 'Informe Técnico', 'description' => 'Elaboración de un proyecto y documentar el proceso mediante una estructura'),
            array('name' => 'Tesis', 'description' => 'Proyecto de investigación'),
            array('name' => 'Tesina', 'description' => 'Proyecto innovador de investigación')
        ];

        DB::table('residencias')->insert($residencia);

       /*DB::table('residencias')->insert([
            'name' => 'Informe Técnico',
            'description' => 'Elaboración de un proyecto y documentar el proceso mediante una estructura',
        ]);
        DB::table('residencias')->insert([
            'name' => 'Tesis',
            'description' => 'Proyecto de investigación',
        ]);
        DB::table('residencias')->insert([
            'name' => 'Tesina',
            'description' => 'Proyecto innovador de investigación',
        ]);*/
    }
}
