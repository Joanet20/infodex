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
            $table->integer('dex_nacional');
            $table->string('cambios', 500)->nullable();
            $table->string('categoria', 50);
            $table->enum('evEntregado', ['PS', 'Ataque', 'Defensa', 'Ataque Especial', 'Defensa Especial', 'Velocidad']);
            $table->enum('cantidadEV', ['1', '2', '3', '']);
            $table->enum('evEntregado2', ['PS', 'Ataque', 'Defensa', 'Ataque Especial', 'Defensa Especial', 'Velocidad'])->nullable();
            $table->enum('canridadEV2', ['1', '2', '3', ''])->nullable();
            $table->enum('evEntregado3', ['PS', 'Ataque', 'Defensa', 'Ataque Especial', 'Defensa Especial', 'Velocidad'])->nullable();
            $table->enum('cantidadEV3', ['1', '2', '3', ''])->nullable();
            $table->integer('ratioCaptura');
            $table->integer('amistadBase');
            $table->float('probMacho', 10, 0)->nullable();
            $table->float('probHembra', 10, 0)->nullable();
            $table->boolean('sinGenero');
            $table->boolean('unicaForma');
            $table->string('numForma', 20)->nullable();
            $table->string('nombre_jap', 50);
            $table->string('nombre_ale', 50);
            $table->string('nombre_ing', 50);
            $table->string('nombre_ita', 50);
            $table->string('nombre_fra', 50);
            $table->foreignId('crecimiento')->index('pokemonCrecimiento');
            $table->foreignId('ciclos')->index('pokemonCiclos');
            $table->foreignId('objetoEquipado')->nullable()->index('pokemonItem');
            $table->foreignId('grupoHuevo')->index('pokemonGrupoHuevo');
            $table->foreignId('grupoHuevo2')->nullable()->index('pokemonGrupoHuevo2');
            $table->foreignId('habilidad1')->index('pokemonHabilidad1');
            $table->foreignId('habilidad2')->nullable()->index('pokemonHabilidad2');
            $table->foreignId('habilidadOculta')->nullable()->index('pokemonHabilidadOculta');
            $table->foreignId('tipo1')->index('pokemonTipo1');
            $table->foreignId('tipo2')->nullable()->index('pokemonTipo2');
            $table->foreignId('generacion')->index('pokemonGeneracion');
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
