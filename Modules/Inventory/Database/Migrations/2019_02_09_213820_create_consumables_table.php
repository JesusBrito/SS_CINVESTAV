<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreConsumible',30);
            $table->unsignedInteger('idCategoria');
            $table->Integer('existencia');
            $table->Integer('puntoReorden');
            $table->string('descripcion',80);
            $table->tinyInteger('estado');

            $table->foreign('idCategoria')->references('id')->on('category_consumables');

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
        Schema::dropIfExists('consumables');
    }
}
