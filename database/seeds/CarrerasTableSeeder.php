<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('carreras')->insert([
            'name' => 'Licenciatura en Administración',
        ],[
            'name' => 'Ingeniería Civil',
        ],
        [
            'name' => 'Ingeniería en Gestión Empresarial',
        ],
        [
            'name' => 'Ingeniería Industrial',
        ],
        [
            'name' => 'Ingeniería Mecatronica',
        ],
        [
            'name' => 'Ingeniería en Sistemas Computacionales',
        ]);*/
        $carrera = [
            array('name' => 'Licenciatura en Administración'),
            array('name' => 'Ingeniería Civil'),
            array('name' => 'Ingeniería en Gestión Empresarial'),
            array('name' => 'Ingeniería Industrial'),
            array('name' => 'Ingeniería Mecatronica'),
            array('name' => 'Ingeniería en Sistemas Computacionales')
        ];

        DB::table('carreras')->insert($carrera);

        /*DB::table('carreras')->insert([
            'name' => 'Licenciatura en Administración',
        ]);
        DB::table('carreras')->insert([
            'name' => 'Ingeniería Civil',
        ]);
        DB::table('carreras')->insert([
            'name' => 'Ingeniería en Gestión Empresarial',
        ]);
        DB::table('carreras')->insert([
            'name' => 'Ingeniería Industrial',
        ]);
        DB::table('carreras')->insert([
            'name' => 'Ingeniería Mecatronica',
        ]);
        DB::table('carreras')->insert([
            'name' => 'Ingeniería en Sistemas Computacionales',
        ]);*/
    }
}
