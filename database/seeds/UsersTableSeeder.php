<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // usuario con el rol Normal
        $normal = User::create([
            'name' => 'Alicia',
            'first' => 'García',
            'second' => 'Santana',
            'phone' => '9511001004',
            'email' => 'alicia@ittlaxiaco.edu.mx',
            'password' =>bcrypt('secret')
        ]);

        $normal->assignRole('Normal');

        // usuario con el rol Coordinador
        $coordinador = User::create([
            'name' => 'Abigail',
            'first' => 'Perez',
            'second' => 'Castro',
            'phone' => '9531254501',
            'email' => 'abigail@ittlaxiaco.edu.mx',
            'password' =>bcrypt('secret')
        ]);

        $coordinador->assignRole('Coordinador');

        // usuario con el rol Administrador
        $administrador = User::create([
            'name' => 'Norma',
            'first' => 'Rosas',
            'second' => 'Gutierrez',
            'phone' => '9531001234',
            'email' => 'norma@ittlaxiaco.edu.mx',
            'password' =>bcrypt('secret')
        ]);

        $administrador->assignRole('Administrador');
    }
}
