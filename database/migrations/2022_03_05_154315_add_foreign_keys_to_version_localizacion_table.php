<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVersionLocalizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('version_localizacion', function (Blueprint $table) {
            $table->bigInteger('version_id')->unsigned();
            $table->foreign('version_id')->references('id')->on('version')->after('id');
            $table->bigInteger('localizacion_id')->unsigned();
            $table->foreign('localizacion_id')->references('id')->on('localizacion')->after('version_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('version_localizacion', function (Blueprint $table) {
            $table->dropForeign('version_localizacion_version_id_foreign');
            $table->dropForeign('version_localizacion_localizacion_id_foreign');
        });
    }
}
