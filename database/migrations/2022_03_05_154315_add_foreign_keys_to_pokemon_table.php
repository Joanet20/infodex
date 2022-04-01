<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pokemon', function (Blueprint $table) {
            $table->bigInteger('crecimiento_id')->unsigned();
            $table->foreign('crecimiento_id')->references('id')->on('crecimientos');
            $table->bigInteger('ciclosHuevo_id')->unsigned();
            $table->foreign('ciclosHuevo_id')->references('id')->on('ciclos_huevo');
            $table->bigInteger('objeto_id')->unsigned();
            $table->foreign('objeto_id')->references('id')->on('objeto');
            $table->bigInteger('grupoHuevo_id')->unsigned();
            $table->foreign('grupoHuevo_id')->references('id')->on('grupo_huevo');
            $table->bigInteger('grupoHuevo2_id')->unsigned();
            $table->foreign('grupoHuevo2_id')->references('id')->on('grupo_huevo');
            $table->bigInteger('habilidad_id')->unsigned();
            $table->foreign('habilidad_id')->references('id')->on('habilidad');
            $table->bigInteger('habilidad2_id')->unsigned();
            $table->foreign('habilidad2_id')->references('id')->on('habilidad');
            $table->bigInteger('habilidadOculta_id')->unsigned();
            $table->foreign('habilidadOculta_id')->references('id')->on('habilidad');
            $table->bigInteger('tipo_id')->unsigned();
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->bigInteger('tipo2_id')->unsigned();
            $table->foreign('tipo2_id')->references('id')->on('tipos');
            $table->bigInteger('generacion_id')->unsigned();
            $table->foreign('generacion_id')->references('id')->on('generacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pokemon', function (Blueprint $table) {
            //
        });
    }
}
