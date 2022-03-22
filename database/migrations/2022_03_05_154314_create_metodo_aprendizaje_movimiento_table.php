<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetodoAprendizajeMovimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metodo_aprendizaje_movimiento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('version')->index('aprendizajeVersion');
            $table->string('nombreMetodo', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metodo_aprendizaje_movimiento');
    }
}
