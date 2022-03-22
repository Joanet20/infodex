<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEvolucionConPokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evolucion_con_pokemon', function (Blueprint $table) {
            $table->foreign(['pokemon'], 'pokemonEquipo')->references(['id'])->on('pokemon')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['id_metodoEvolucion'], 'evolucionPokemon')->references(['id'])->on('metodo_evolucion')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evolucion_con_pokemon', function (Blueprint $table) {
            $table->dropForeign('pokemonEquipo');
            $table->dropForeign('evolucionPokemon');
        });
    }
}
