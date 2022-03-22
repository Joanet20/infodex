<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolucionPorStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evolucion_por_stats', function (Blueprint $table) {
            $table->integer('id_metodoEvolucion')->primary();
            $table->integer('nivel');
            $table->enum('condicion', ['Ataque > Defensa', 'Ataque < Defensa', 'Ataque = Defensa', '']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evolucion_por_stats');
    }
}
