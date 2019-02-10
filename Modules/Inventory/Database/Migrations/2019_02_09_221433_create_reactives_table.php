<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReactivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reactives', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idTipoReactivo');
            $table->unsignedInteger('idTemperatura');
            $table->unsignedInteger('idToxicidad');
            $table->string('nombreEspañol',45);
            $table->string('nombreIngles',45);
            $table->integer('puntoReorden');
            $table->text('manejo');
            $table->integer('totalExistencia');
            $table->tinyInteger('estado');
            $table->timestamps();
            $table->foreign('idTipoReactivo')->references('id')->on('Type_reactives');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reactives');
    }
}
