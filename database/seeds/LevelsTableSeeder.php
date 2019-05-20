<?php

use Illuminate\Database\Seeder;
use App\Level;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'grado' => 'Licenciatura'
        ]);

        Level::create([
            'grado' => 'Maestría'
        ]);

        Level::create([
            'grado' => 'Doctorado'
        ]);
    }
}
