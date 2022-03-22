<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescripcionVersionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descripcion_version', function (Blueprint $table) {
            $table->foreignId('id_pokemon')->index('descripcionPokemon');
            $table->foreignId('id_version')->index('descripcionVersion');
            $table->string('descripcion', 500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('descripcion_version');
    }
}
