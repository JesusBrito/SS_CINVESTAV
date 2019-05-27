<?php

use App\User;
use App\UserType;
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
        $lfcg = User::create([
            'nombre' => 'Luis',
            'a_paterno' => 'Cabello',
            'a_materno' => 'Galicia',
            'fecha_nacimiento' => '1996-12-26',
            'sexo' => 'Hombre',
            'email' => 'lfcg.programador@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $jesus = User::create([
            'nombre' => 'Juan Jesús',
            'a_paterno' => 'Brito',
            'a_materno' => 'Brito',
            'fecha_nacimiento' => '1996-11-29',
            'sexo' => 'Hombre',
            'email' => 'jesus291196@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $fer = User::create([
            'nombre' => 'Fernando',
            'a_paterno' => 'García',
            'a_materno' => 'Vázquez',
            'fecha_nacimiento' => '1997-09-05',
            'sexo' => 'Hombre',
            'email' => 'jfer.garciav@gmail.com',
            'password' => bcrypt('admin1234'),
        ]);

        $tipoAdmin = UserType::whereNombre('Administrador')->first();
        $lfcg->tipoUsuario()->associate($tipoAdmin);
        $lfcg->save();
        $fer->tipoUsuario()->associate($tipoAdmin);
        $fer->save();
        $jesus->tipoUsuario()->associate($tipoAdmin);
        $jesus->save();
    }
}
