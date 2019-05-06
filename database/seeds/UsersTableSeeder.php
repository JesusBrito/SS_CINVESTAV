<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        User::create([
            'nombre' => 'Luis',
            'a_paterno' => 'Cabello',
            'a_materno' => 'Galicia',
            'tipo_usuario' => 'Administrador',
            'fecha_nacimiento' => '1996-12-26',
            'sexo' => 1,
            'email' => 'lfcg.programador@gmail.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'nombre' => 'Fernando',
            'a_paterno' => 'García',
            'a_materno' => 'Vázquez',
            'tipo_usuario' => 'Administrador',
            'fecha_nacimiento' => '1997-09-05',
            'sexo' => 1,
            'email' => 'jfer.garciav@gmail.com',
            'password' => bcrypt('admin1234'),
        ]);
    }
}
