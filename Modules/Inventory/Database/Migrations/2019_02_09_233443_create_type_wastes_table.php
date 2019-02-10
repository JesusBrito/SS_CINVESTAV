<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeWastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_wastes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('categoria',20);
            $table->string('tipo',20);
            $table->string('recipiente',20);
            $table->string('equipoSeguridad',80);
            $table->text('procedimiento');
            $table->string('horario',45);
            $table->tinyInteger('estado');

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
        Schema::dropIfExists('type_wastes');
    }
}
