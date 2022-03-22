<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolucionPorNivelConObjetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evolucion_por_nivel_con_objeto', function (Blueprint $table) {
            $table->foreignId('id_metodoEvolucion')->index('evoNivelItem');
            $table->foreignId('objetoEquipado')->index('objetoEquipadoNivel');
            $table->enum('horario', ['Día', 'Noche', 'Cualquiera', '']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evolucion_por_nivel_con_objeto');
    }
}
