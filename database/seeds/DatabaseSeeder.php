<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            RolesAndPermissions::class,
            UsersTableSeeder::class,
            CarrerasTableSeeder::class,
            ResidenciasTableSeeder::class,
            CarreraUserTableSeeder::class,
            StudentsTableSeeder::class,
        ]);
    }
}
