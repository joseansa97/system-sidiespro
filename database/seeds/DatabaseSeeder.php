<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        $this->truncateTablas([
            'users',
            'carreras',
            'residencias',
            'carrera_user',
            'students'
        ]);

        $this->call([
            RolesAndPermissions::class,
            UsersTableSeeder::class,
            CarrerasTableSeeder::class,
            ResidenciasTableSeeder::class,
            CarreraUserTableSeeder::class,
            StudentsTableSeeder::class,
        ]);
    }

    protected function truncateTablas(array $tablas)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tablas as $tabla) {
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
    
}
