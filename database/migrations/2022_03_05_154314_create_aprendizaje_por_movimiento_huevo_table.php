<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAprendizajePorMovimientoHuevoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aprendizaje_por_movimiento_huevo', function (Blueprint $table) {
            $table->foreignId('id_metodoAprendizaje')->index('movHuevo');
            $table->foreignId('padres')->index('padresMovimientoHuevo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aprendizaje_por_movimiento_huevo');
    }
}
