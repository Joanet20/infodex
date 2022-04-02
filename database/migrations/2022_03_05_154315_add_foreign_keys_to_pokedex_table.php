<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPokedexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pokedex', function (Blueprint $table) {
            $table->bigInteger('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regiones')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pokedex', function (Blueprint $table) {
            $table->dropForeign('pokedex_region_id_foreign');
        });
    }
}
