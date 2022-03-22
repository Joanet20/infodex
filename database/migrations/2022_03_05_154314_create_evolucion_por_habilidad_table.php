<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolucionPorHabilidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evolucion_por_habilidad', function (Blueprint $table) {
            $table->foreignId('id_metodoEvolucion')->index('evoHabilidad');
            $table->foreignId('habilidad')->index('habilidadPokemon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evolucion_por_habilidad');
    }
}
