<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objeto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 50);
            $table->integer('precio')->nullable();
            $table->string('descripcion', 500);
            $table->enum('categoria', array_values(config('enums.categoria')));
            $table->string('nombre_jap', 50);
            $table->string('nombre_ale', 50);
            $table->string('nombre_ing', 50);
            $table->string('nombre_ita', 50);
            $table->string('nombre_fra', 50);
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
        Schema::dropIfExists('objeto');
    }
}
