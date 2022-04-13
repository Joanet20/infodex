<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 50);
            $table->integer('experienciaBase');
            $table->float('altura', 10, 0);
            $table->float('peso', 10, 0);
            $table->string('dex_nacional');
            $table->string('cambios', 500)->nullable();
            $table->string('categoria', 50);
            $table->enum('evEntregado', array_values(config('enumEVEntregado.evEntregado')));
            $table->enum('cantidadEV', array_values(config('enumCantEV.cantEV')));
            $table->enum('evEntregado2', array_values(config('enumEVEntregado.evEntregado')))->nullable();
            $table->enum('canridadEV2', array_values(config('enumCantEV.cantEV')))->nullable();
            $table->enum('evEntregado3', array_values(config('enumEVEntregado.evEntregado')))->nullable();
            $table->enum('cantidadEV3', array_values(config('enumCantEV.cantEV')))->nullable();
            $table->integer('ratioCaptura');
            $table->integer('amistadBase');
            $table->float('probMacho', 10, 0)->nullable();
            $table->float('probHembra', 10, 0)->nullable();
            $table->boolean('sinGenero')->nullable();
            $table->boolean('unicaForma')->nullable();
            $table->string('nombreForma', 20)->nullable();
            $table->string('nombre_jap', 50);
            $table->string('nombre_ale', 50);
            $table->string('nombre_ing', 50);
            $table->string('nombre_ita', 50);
            $table->string('nombre_fra', 50);
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
        Schema::dropIfExists('pokemon');
    }
}
