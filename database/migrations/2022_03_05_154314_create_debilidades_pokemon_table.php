<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebilidadesPokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debilidades_pokemon', function (Blueprint $table) {
            $table->foreignId('id_pokemon')->index('pokemonAtacado');
            $table->foreignId('tipo_movimiento')->index('tipoMovimientoAtacante');
            $table->integer('dano');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debilidades_pokemon');
    }
}
