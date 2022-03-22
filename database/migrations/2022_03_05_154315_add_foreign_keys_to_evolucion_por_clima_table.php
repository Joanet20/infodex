<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEvolucionPorClimaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evolucion_por_clima', function (Blueprint $table) {
            $table->foreign(['id_metodoEvolucion'], 'evolucionClima')->references(['id'])->on('metodo_evolucion')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evolucion_por_clima', function (Blueprint $table) {
            $table->dropForeign('evolucionClima');
        });
    }
}
