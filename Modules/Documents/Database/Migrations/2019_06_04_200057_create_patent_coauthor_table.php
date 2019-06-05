<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatentCoauthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patent_coauthor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_coautor');
            $table->unsignedInteger('id_patente');
            // $table->unsignedInteger('id_coautor');
            $table->timestamps();

            $table->foreign('id_patente')->references('id')->on('groups')->onDelete('cascade');
            // $table->foreign('id_coautor')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patent_coauthor');
    }
}
