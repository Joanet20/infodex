<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientoPokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento_pokemon', function (Blueprint $table) {
            $table->foreignId('id_pokemon')->index('movimientoPokemon');
            $table->foreignId('id_movimiento')->index('movimiento');
            $table->foreignId('metdoAprendizaje')->index('metodoAprendizaje');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimiento_pokemon');
    }
}
