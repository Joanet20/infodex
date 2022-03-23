<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToObjetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('objeto', function (Blueprint $table) {
            $table->bigInteger('generacion_id')->unsigned();
            $table->foreign('generacion_id')->references('id')->on('generacion')->after('nombre_fra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('objeto', function (Blueprint $table) {
            //
        });
    }
}
