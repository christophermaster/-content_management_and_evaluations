<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('peoples', function (Blueprint $table) {
            $table->increments('id');//identificador de la tabla
            $table->string('nombre'); //nombre de la Escuela de la universidad de carabobo;
            $table->string('apellido'); //nombre de la Escuela de la universidad de carabobo
            $table->string('cedula')->unique(); //nombre de la Escuela de la universidad de carabobo
            $table->string('usuario_creador');
            $table->string('usuario_modificador');
            $table->string('descripcion')->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peoples');
    }
}
