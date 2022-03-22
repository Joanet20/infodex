<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEvolucionPorIntercambioConObjetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evolucion_por_intercambio_con_objeto', function (Blueprint $table) {
            $table->foreign(['objetoEquipado'], 'objetoEquipado')->references(['id'])->on('objeto')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['id_metodoEvolucion'], 'evolucionIntercambioItem')->references(['id'])->on('metodo_evolucion')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evolucion_por_intercambio_con_objeto', function (Blueprint $table) {
            $table->dropForeign('objetoEquipado');
            $table->dropForeign('evolucionIntercambioItem');
        });
    }
}
