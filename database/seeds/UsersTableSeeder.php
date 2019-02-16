<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'Nombre' => 'Luis',
            'A_Paterno' => 'Cabello',
            'A_Materno' => 'Galicia',
            'Tipo_Usuario' => 'Administrador',
            'FechaNac' => '1996-12-26',
            'Sexo' => 1,
            'Correo' => 'lfcg.programador@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
