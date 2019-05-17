<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailReactivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_reactives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idDetalleCatalogo',45)->unique();
            $table->unsignedInteger('idReactivo');
            $table->unsignedInteger('idProveedor');
            $table->unsignedInteger('idUbicacion');
            $table->unsignedInteger('idUnidad');                 
            $table->string('marca',30);
            $table->double('cantidad',8,2);
            $table->integer('existencia');
            $table->datetime('fechaCaducidad');
            $table->text('lote');
            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
            $table->foreign('idReactivo')->references('id')->on('reactives');
            $table->foreign('idProveedor')->references('id')->on('providers');
            $table->foreign('idUbicacion')->references('id')->on('locations');
            $table->foreign('idUnidad')->references('id')->on('unities');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_reactives');
    }
}
