<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAprendizajePorMovimientoHuevoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aprendizaje_por_movimiento_huevo', function (Blueprint $table) {
            $table->foreign(['padres'], 'padresMovimientoHuevo')->references(['id'])->on('padres_movimiento_huevo')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['id_metodoAprendizaje'], 'aprendizajeMovHuevo')->references(['id'])->on('metodo_aprendizaje_movimiento')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aprendizaje_por_movimiento_huevo', function (Blueprint $table) {
            $table->dropForeign('padresMovimientoHuevo');
            $table->dropForeign('aprendizajeMovHuevo');
        });
    }
}
