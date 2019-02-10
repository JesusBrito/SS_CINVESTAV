<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailConsumablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_consumables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idDetalleCatalogo',45);
            $table->unsignedInteger('idConsumible');
            $table->string('marca',30);
            $table->unsignedInteger('idUbicacion');
            $table->unsignedInteger('idProveedor');
            $table->unsignedInteger('idUnidad');
            $table->double('cantidad',8,2);
            $table->Integer('existencia');
            $table->tinyInteger('estado');

            $table->foreign('idConsumible')->references('id')->on('consumables');
            $table->foreign('idUbicacion')->references('id')->on('locations');
            $table->foreign('idProveedor')->references('id')->on('providers');
            $table->foreign('idUnidad')->references('id')->on('unities');

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
        Schema::dropIfExists('detail_consumables');
    }
}
