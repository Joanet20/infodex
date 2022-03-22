<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEvolucionPorGeneroYObjetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evolucion_por_genero_y_objeto', function (Blueprint $table) {
            $table->foreign(['objetoEquipado'], 'objetoGenero')->references(['id'])->on('objeto')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['id_metodoEvolucion'], 'evolucionGeneroObjeto')->references(['id'])->on('metodo_evolucion')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evolucion_por_genero_y_objeto', function (Blueprint $table) {
            $table->dropForeign('objetoGenero');
            $table->dropForeign('evolucionGeneroObjeto');
        });
    }
}
