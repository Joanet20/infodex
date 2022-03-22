<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 20);
            $table->integer('punteria')->nullable();
            $table->string('descripcion', 500);
            $table->string('efectoSecundario', 500)->nullable();
            $table->integer('pp');
            $table->integer('prioridad');
            $table->integer('potencia')->nullable();
            $table->enum('clase', ['Físico', 'Especial', 'Estado', '']);
            $table->string('cambios', 500)->nullable();
            $table->enum('objetivo', ['Usuario', 'Pokémon aliado', 'Todos los aliados', 'Usuario o Pokémon aliado', 'Equipo aliado', 'Elegido', 'Oponente elegido', 'Oponente aleatorio', 'Oponentes adyacentes', 'Todos los oponentes', 'Pokémon adyacentes', 'Todos los Pokémon', '']);
            $table->foreignId('generacion')->index('generacionMovimiento');
            $table->foreignId('tipo')->index('tipoMovimiento');
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
        Schema::dropIfExists('movimiento');
    }
}
