<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCadenaEvolutivaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cadena_evolutiva', function (Blueprint $table) {
            $table->bigInteger('pokemonBase_id')->unsigned();
            $table->foreign('pokemonBase_id')->references('id')->on('pokemon');
            $table->bigInteger('pokemon1_id')->unsigned()->nullable();
            $table->foreign('pokemon1_id')->references('id')->on('pokemon');
            $table->bigInteger('pokemon2_id')->unsigned()->nullable();
            $table->foreign('pokemon2_id')->references('id')->on('pokemon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cadena_evolutiva', function (Blueprint $table) {
            $table->dropForeign('cadena_evolutiva_pokemonBase_id_foreign');
            $table->dropForeign('cadena_evolutiva_pokemon1_id_foreign');
            $table->dropForeign('cadena_evolutiva_pokemon2_id_foreign');
        });
    }
}
