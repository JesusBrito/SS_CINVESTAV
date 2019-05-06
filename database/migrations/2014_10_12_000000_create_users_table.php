<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('imagen')->default('default.png');
            $table->string('nombre', 45);
            $table->string('a_paterno', 45);
            $table->string('a_materno', 45);
            $table->enum('tipo_usuario', ['Estudiante', 'Profesor', 'Administrador', 'Auxiliar', 'Técnico']);
            $table->string('celular', 10)->nullable();
            $table->date('fecha_nacimiento');
            $table->boolean('sexo');
            $table->boolean('estatus')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
