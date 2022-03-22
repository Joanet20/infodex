<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalizacionPokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localizacion_pokemon', function (Blueprint $table) {
            $table->foreignId('id_pokemon')->index('localizacionPokemon');
            $table->foreignId('id_localizacion')->index('localizacion');
            $table->foreignId('id_version')->index('localizacionVersion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localizacion_pokemon');
    }
}
