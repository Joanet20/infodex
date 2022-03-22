<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolucionPorGeneroYObjetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evolucion_por_genero_y_objeto', function (Blueprint $table) {
            $table->foreignId('id_metodoEvolucion')->index('evoGeneroObjeto');
            $table->foreignId('objetoEquipado')->index('objetoGenero');
            $table->enum('genero', ['Macho', 'Hembra']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evolucion_por_genero_y_objeto');
    }
}
