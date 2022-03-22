<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAprendizajePorMtMoDtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aprendizaje_por_mt/mo/dt', function (Blueprint $table) {
            $table->foreignId('id_metodoAprendizaje')->index('movMTMODT');
            $table->foreignId('mt/mo/dt')->index('mtmodt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aprendizaje_por_mt/mo/dt');
    }
}
