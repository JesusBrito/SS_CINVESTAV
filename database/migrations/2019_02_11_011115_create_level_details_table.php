<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('carrera');
            $table->string('escuela');
            $table->integer('fecha_inicio');
            $table->integer('fecha_fin');
            $table->enum('estatus', ['Egresado','Titulado','En Progreso','Pasante']);
            $table->timestamps();
            $table->unsignedInteger('id_usuario')->nullable();
            $table->unsignedInteger('id_nivel')->nullable();

            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_nivel')->references('id')->on('levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('level_details');
    }
}
