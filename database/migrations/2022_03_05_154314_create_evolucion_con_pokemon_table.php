<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolucionConPokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evolucion_con_pokemon', function (Blueprint $table) {
            $table->foreignId('id_metodoEvolucion')->index('evoPokemonEquipado');
            $table->foreignId('pokemon')->index('pokemonEquipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evolucion_con_pokemon');
    }
}
