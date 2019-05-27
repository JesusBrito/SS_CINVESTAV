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
            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
            $table->foreign('idTipoReactivo')->references('id')->on('type_reactives');
            $table->foreign('idTemperatura')->references('id')->on('temperatures');
            $table->foreign('idToxicidad')->references('id')->on('toxicities');
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
