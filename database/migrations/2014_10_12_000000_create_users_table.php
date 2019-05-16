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
            $table->string('imagen')->nullable();
            $table->string('nombre');
            $table->string('a_paterno');
            $table->string('a_materno');
            $table->string('celular', 10)->nullable();
            $table->date('fecha_nacimiento');
            $table->enum('sexo', ['Hombre', 'Mujer']);
            $table->boolean('estatus')->default(1);
            $table->rememberToken();
            $table->timestamps();

            $table->unsignedInteger('id_tipo_usuario')->nullable();
            $table->foreign('id_tipo_usuario')->references('id')->on('user_types')->onDelete('set null');
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
