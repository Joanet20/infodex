<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePadresMovimientoHuevoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padres_movimiento_huevo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('padre')->index('pokemonPadre');
            $table->foreignId('hijo')->index('pokemonHijo');
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
        Schema::dropIfExists('padres_movimiento_huevo');
    }
}
