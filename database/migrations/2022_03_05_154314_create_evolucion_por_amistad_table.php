<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolucionPorAmistadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evolucion_por_amistad', function (Blueprint $table) {
            $table->foreignId('id_metodoEvolucion')->index('evoAmistad');
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
        Schema::dropIfExists('evolucion_por_amistad');
    }
}
