<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRegionesVersionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('regiones_version', function (Blueprint $table) {
            $table->bigInteger('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regiones')->after('id');
            $table->bigInteger('version_id')->unsigned();
            $table->foreign('version_id')->references('id')->on('version')->after('region_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('regiones_version', function (Blueprint $table) {
            $table->dropForeign('regiones_version_region_id_foreign');
            $table->dropForeign('regiones_version_version_id_foreign');
        });
    }
}
