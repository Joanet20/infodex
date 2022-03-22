<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEvolucionPorIntercambioPokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evolucion_por_intercambio_pokemon', function (Blueprint $table) {
            $table->foreign(['pokemon'], 'pokemonIntercambiado')->references(['id'])->on('pokemon')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['id_metodoEvolucion'], 'evolucionIntercambioPokemon')->references(['id'])->on('metodo_evolucion')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evolucion_por_intercambio_pokemon', function (Blueprint $table) {
            $table->dropForeign('pokemonIntercambiado');
            $table->dropForeign('evolucionIntercambioPokemon');
        });
    }
}
