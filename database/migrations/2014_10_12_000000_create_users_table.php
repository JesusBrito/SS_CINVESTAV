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
            $table->increments('idUsuario');
            $table->string('Correo', 70)->unique();
            $table->string('Clave',20);
            $table->text('Imagen')->nullable();
            $table->string('Nombre',45);
            $table->string('A_Paterno',45);
            $table->string('A_Materno',45);
            $table->enum('Tipo_Usuario',['Estudiante', 'Profesor','Administrador','Auxiliar', 'Técnico']);
            $table->string('Celular',10)->nullable();
            $table->string('Permisos',45);
            $table->date('FechaNac');
            $table->boolean('Sexo');
            $table->boolean('Estatus');
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
