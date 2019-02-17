<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idProveedor');
            $table->string('nombre',45);
            $table->string('telefono',15);
            $table->string('email',50)->unique();
            $table->tinyInteger('estado');         
            $table->timestamps();
            $table->foreign('idProveedor')->references('id')->on('providers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_providers');
    }
}
