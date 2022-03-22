<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolucionPorIntercambioPokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evolucion_por_intercambio_pokemon', function (Blueprint $table) {
            $table->foreignId('id_metodoEvolucion')->index('evoIntercambioPkmn');
            $table->foreignId('pokemon')->index('pokemonIntercambiado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evolucion_por_intercambio_pokemon');
    }
}
