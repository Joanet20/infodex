<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAprendizajePorTutorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aprendizaje_por_tutor', function (Blueprint $table) {
            $table->foreign(['id_metodoAprendizaje'], 'aprendizajeTutor')->references(['id'])->on('metodo_aprendizaje_movimiento')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aprendizaje_por_tutor', function (Blueprint $table) {
            $table->dropForeign('aprendizajeTutor');
        });
    }
}
