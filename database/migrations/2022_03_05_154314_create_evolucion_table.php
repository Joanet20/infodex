<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evolucion', function (Blueprint $table) {
            $table->foreignId('id_pokemon')->index('pokemonPorEvolucionar');
            $table->foreignId('evolucionado')->index('pokemonEvolucionado');
            $table->foreignId('metodoEvolucion')->index('metodoEvolucion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evolucion');
    }
}
