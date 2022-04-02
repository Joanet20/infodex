<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDescripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('descripcion', function (Blueprint $table) {
            $table->bigInteger('pokemon_id')->unsigned();
            $table->foreign('pokemon_id')->references('id')->on('pokemon');
            $table->bigInteger('version_id')->unsigned();
            $table->foreign('version_id')->references('id')->on('version');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('descripcion', function (Blueprint $table) {
            $table->dropForeign('descripcion_pokemon_id_foreign');
            $table->dropForeign('descripcion_version_id_foreign');
        });
    }
}
