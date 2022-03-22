<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNumeroPokedexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('numero_pokedex', function (Blueprint $table) {
            $table->integer('numeroDex');
            $table->foreignId('version')->index('versionPokedex');
            $table->foreignId('pokemon')->index('pokemonDex');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('numero_pokedex');
    }
}
