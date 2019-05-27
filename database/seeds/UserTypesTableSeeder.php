<?php

use App\UserType;
use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserType::create([
            'nombre' => 'Administrador',
            'descripcion' => 'Usuario con acceso a todo'
        ]);

        UserType::create([
            'nombre' => 'Profesor',
            'descripcion' => 'Usuario profesor'
        ]);

        UserType::create([
            'nombre' => 'Estudiante',
            'descripcion' => 'Usuario estudiante'
        ]);

        UserType::create([
            'nombre' => 'Auxiliar',
            'descripcion' => 'Usuario auxiliar'
        ]);

        UserType::create([
            'nombre' => 'Técnico',
            'descripcion' => 'Usuario técnico'
        ]);
    }
}
