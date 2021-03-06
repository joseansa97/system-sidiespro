<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estudiantes = [
            array('titulo' => 'Aplicacion movil para acompañamiento de turistas', 'asesor' => 'Ing. Jose Alfredo Roman Cruz', 'autor' => 'Hugo Florencio Garcia', 'autor2' => 'Edson de los Santos Vargas', 'carrera_id' => '1', 'residencia_id' => '1', 'archivo' => 'archivo1.pdf'),
            array('titulo' => 'Plataforma para el control de niñas y niños', 'asesor' => 'Ing. Hilario Vidal García Hernández', 'autor' => 'Diana Laura Isunza Cruz', 'autor2' => 'Geovany Hernandez', 'carrera_id' => '6', 'residencia_id' => '2', 'archivo' => 'archivo2.pdf'),
            array('titulo' => 'Pavimentacion', 'asesor' => 'Ing. Tobias Toledo Cruz', 'autor' => 'Pedro Lopez', 'autor2' => 'Lorena Cruz', 'carrera_id' => '2', 'residencia_id' => '1', 'archivo' => 'archivo3.pdf')
        ];
        DB::table('students')->insert($estudiantes);

        /*DB::table('students')->insert([
            'titulo' => 'Aplicacion movil para acompañamiento de turistas',
            'asesor' => 'Jose Alfredo Roman Cruz',
            'autor' => 'Hugo Florencio Garcia',
            'autor2' => 'Edson de los Santos Vargas',
            'carrera_id' => '1',
            'residencia_id' => '1',
            'archivo' => 'archivo1.pdf',
        ]);
        DB::table('students')->insert([
            'titulo' => 'Plataforma para el control de niñas y niños',
            'asesor' => 'Jose Alfredo Roman Cruz',
            'autor' => 'Diana Laura Isunza Cruz',
            'autor2' => 'Geovany Hernandez',
            'carrera_id' => '6',
            'residencia_id' => '2',
            'archivo' => 'archivo2.pdf',
        ]);
        DB::table('students')->insert([
            'titulo' => 'Pavimentacion',
            'asesor' => 'Tobias Toledo Cruz',
            'autor' => 'Pedro Lopez',
            'autor2' => 'Lorena Cruz',
            'carrera_id' => '2',
            'residencia_id' => '1',
            'archivo' => 'archivo3.pdf',
        ]);*/

    }
}
