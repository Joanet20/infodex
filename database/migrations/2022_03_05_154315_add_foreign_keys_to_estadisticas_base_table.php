<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEstadisticasBaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estadisticas_base', function (Blueprint $table) {
            $table->foreign(['id_pokemon'], 'statsPokemon')->references(['id'])->on('pokemon')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estadisticas_base', function (Blueprint $table) {
            $table->dropForeign('statsPokemon');
        });
    }
}
