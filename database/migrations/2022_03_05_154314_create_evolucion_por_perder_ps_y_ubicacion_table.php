<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolucionPorPerderPsYUbicacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evolucion_por_perder_ps_y_ubicacion', function (Blueprint $table) {
            $table->foreignId('id_metodoEvolucion')->index('evoPerderPSLocalizacion');
            $table->foreignId('localizacion')->index('localizacionPerdidaPS');
            $table->integer('numPS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evolucion_por_perder_ps_y_ubicacion');
    }
}
