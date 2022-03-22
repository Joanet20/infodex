<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDescripcionVersionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('descripcion_version', function (Blueprint $table) {
            $table->foreign(['id_version'], 'descripcionVersion')->references(['id'])->on('version')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['id_pokemon'], 'descripcionPokemon')->references(['id'])->on('pokemon')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('descripcion_version', function (Blueprint $table) {
            $table->dropForeign('descripcionVersion');
            $table->dropForeign('descripcionPokemon');
        });
    }
}
