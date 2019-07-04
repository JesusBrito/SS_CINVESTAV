<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCongresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('congresos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('pais');
            $table->date('fecha_solicitud');
            $table->date('fecha_registro');
            $table->date('fecha_expiracion');
            $table->string('numero');
            $table->text('descripcion');
            $table->string('documento');
            $table->timestamps();
            $table->unsignedInteger('id_autor')->nullable();

            $table->foreign('id_autor')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('congresos');
    }
}
