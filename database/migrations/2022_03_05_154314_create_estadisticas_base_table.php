<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadisticasBaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadisticas_base', function (Blueprint $table) {
            $table->integer('ps');
            $table->integer('ataque');
            $table->integer('defensa');
            $table->integer('ataqueEspecial');
            $table->integer('defensaEspecial');
            $table->integer('velocidad');
            $table->foreignId('id_pokemon')->index('statsPokemon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estadisticas_base');
    }
}
