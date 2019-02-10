<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_equipments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idDetalleCinvestav', 45)->unique();
            $table->unsignedInteger('idProveedor');
            $table->unsignedInteger('idEquipo');
            $table->unsignedInteger('idEncargado');
            $table->integer('numSerie');
            $table->dateTime('fechaGarantia');
            $table->string('imagen', 80);
            $table->tinyInteger('estado');
            $table->timestamps();

            $table->foreign('idProveedor')->references('id')->on('providers');
            $table->foreign('idEquipo')->references('id')->on('equipments');
           // $table->foreign('idEncargado')references('idEncargado')on(''); relacion pendiente
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_equipments');
    }
}
