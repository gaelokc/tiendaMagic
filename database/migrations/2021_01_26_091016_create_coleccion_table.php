<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColeccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colecciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_coleccion', 100);
            $table->string('imagen_coleccion')->nullable();
            $table->date('fecha-edicion');
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
        Schema::dropIfExists('colecciones');
    }
}
