 <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumableReactivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumable_reactives', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idReactivo');
            $table->unsignedInteger('idConsumible');
            $table->tinyInteger('estado');

            $table->foreign('idReactivo') -> references('id') -> on('reactives');
            $table->foreign('idConsumible') -> references('id') -> on('consumables');

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
        Schema::dropIfExists('consumable_reactives');
    }
}
