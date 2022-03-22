<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolucionPorIntercambioConObjetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evolucion_por_intercambio_con_objeto', function (Blueprint $table) {
            $table->foreignId('id_metodoEvolucion')->index('evoIntercambioObjeto');
            $table->foreignId('objetoEquipado')->index('objetoEquipado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evolucion_por_intercambio_con_objeto');
    }
}
