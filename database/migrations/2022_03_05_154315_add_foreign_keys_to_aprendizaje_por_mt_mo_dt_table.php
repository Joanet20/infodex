<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAprendizajePorMtMoDtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aprendizaje_por_mt/mo/dt', function (Blueprint $table) {
            $table->foreign(['mt/mo/dt'], 'mtmodt')->references(['id'])->on('objeto')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['id_metodoAprendizaje'], 'aprendizajeMTMODT')->references(['id'])->on('metodo_aprendizaje_movimiento')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aprendizaje_por_mt/mo/dt', function (Blueprint $table) {
            $table->dropForeign('mtmodt');
            $table->dropForeign('aprendizajeMTMODT');
        });
    }
}
