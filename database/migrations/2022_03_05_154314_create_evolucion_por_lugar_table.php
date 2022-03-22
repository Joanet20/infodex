<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolucionPorLugarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evolucion_por_lugar', function (Blueprint $table) {
            $table->foreignId('id_metodoEvolucion')->index('evoLocalizacion');
            $table->foreignId('localizacion')->index('localizacionEvolucion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evolucion_por_lugar');
    }
}
