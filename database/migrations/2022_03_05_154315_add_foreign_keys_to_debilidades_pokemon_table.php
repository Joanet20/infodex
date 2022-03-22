<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDebilidadesPokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('debilidades_pokemon', function (Blueprint $table) {
            $table->foreign(['tipo_movimiento'], 'tipoMovimientoAtacante')->references(['id'])->on('tipos')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['id_pokemon'], 'pokemonAtacado')->references(['id'])->on('pokemon')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('debilidades_pokemon', function (Blueprint $table) {
            $table->dropForeign('tipoMovimientoAtacante');
            $table->dropForeign('pokemonAtacado');
        });
    }
}
