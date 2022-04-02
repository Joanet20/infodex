<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToHabilidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('habilidad', function (Blueprint $table) {
            $table->bigInteger('generacion_id')->unsigned();
            $table->foreign('generacion_id')->references('id')->on('generacion')->after('cambios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('habilidad', function (Blueprint $table) {
            $table->dropForeign('habilidad_generacion_id_foreign');
        });
    }
}
