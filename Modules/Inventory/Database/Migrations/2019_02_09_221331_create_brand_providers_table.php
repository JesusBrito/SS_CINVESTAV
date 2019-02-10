<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idProveedor');
            $table->unsignedInteger('idMarcaCompañia');
            $table->tinyInteger('estado');
            $table->timestamps();
            $table->foreign('idProveedor')->references('id')->on('providers');
            $table->foreign('idMarcaCompañia')->references('id')->on('brand_companies');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brand_providers');
    }
}
