<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEvolucionPorHabilidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evolucion_por_habilidad', function (Blueprint $table) {
            $table->foreign(['habilidad'], 'habilidadPokemon')->references(['id'])->on('habilidad')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['id_metodoEvolucion'], 'evolucionHabilidad')->references(['id'])->on('metodo_evolucion')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evolucion_por_habilidad', function (Blueprint $table) {
            $table->dropForeign('habilidadPokemon');
            $table->dropForeign('evolucionHabilidad');
        });
    }
}
