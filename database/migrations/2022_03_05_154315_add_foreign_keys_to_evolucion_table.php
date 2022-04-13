<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEvolucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evolucion', function (Blueprint $table) {
            $table->bigInteger('evoluciona_id')->unsigned();
            $table->foreign('evoluciona_id')->references('id')->on('pokemon');
            $table->bigInteger('evolucionado_id')->unsigned();
            $table->foreign('evolucionado_id')->references('id')->on('pokemon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evolucion', function (Blueprint $table) {
            $table->dropForeign('evolucion_evoluciona_id_foreign');
            $table->dropForeign('evolucion_evolucionado_id_foreign');
        });
    }
}
