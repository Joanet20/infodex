<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEvolucionPorAfectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evolucion_por_afecto', function (Blueprint $table) {
            $table->foreign(['tipo'], 'tipoAfecto')->references(['id'])->on('tipos')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['id_metodoEvolucion'], 'evolucionAfecto')->references(['id'])->on('metodo_evolucion')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evolucion_por_afecto', function (Blueprint $table) {
            $table->dropForeign('tipoAfecto');
            $table->dropForeign('evolucionAfecto');
        });
    }
}
