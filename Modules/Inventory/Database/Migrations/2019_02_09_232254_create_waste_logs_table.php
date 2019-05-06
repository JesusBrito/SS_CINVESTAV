<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWasteLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waste_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_usuario');
            $table->unsignedInteger('idTipoDesecho');
            $table->unsignedInteger('idUnidad');
            $table->dateTime('fecha');
            $table->time('hora');
            $table->double('cantidad',8,2);
            $table->string('descripcion',80);
            $table->string('creti',5);
            $table->tinyInteger('estado');

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('idTipoDesecho')->references('id')->on('type_wastes');
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
        Schema::dropIfExists('waste_logs');
    }
}
