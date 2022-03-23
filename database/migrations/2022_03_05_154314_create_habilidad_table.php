<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabilidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habilidad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 50);
            $table->string('nombre_ing', 50);
            $table->string('nombre_jap', 50);
            $table->string('nombre_ale', 50);
            $table->string('nombre_fra', 50);
            $table->string('nombre_ita', 50);
            $table->string('efecto_en_combate', 500)->nullable();
            $table->string('efecto_fuera_combate', 500)->nullable();
            $table->string('descripcion', 500);
            $table->string('cambios', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habilidad');
    }
}
