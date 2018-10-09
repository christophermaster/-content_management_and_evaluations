<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('exercises', function (Blueprint $table) {
            $table->increments('id');//identificador de la tabla
            $table->integer('id_usuario')->unsigned();//identificador de la facultad que pertenece la escuela
            $table->string('usuario_creador');
            $table->string('usuario_modificador');
            $table->longText('contenido'); //nombre de la Escuela de la universidad de carabobo
            $table->integer('id_dificultad')->unsigned(); //nombre de la Escuela de la universidad de carabobo
            $table->boolean('aprobado');
            $table->integer('id_contenido')->unsigned();
            $table->timestamps();
        });

        Schema::table('exercises', function($table){
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_dificultad')->references('id')->on('difficulties')->onDelete('cascade');
            $table->foreign('id_contenido')->references('id')->on('contents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('exercises', function($table)
        {
            Schema::dropIfExists('exercises');
            $table->dropForeign('exercises_id_usuario_foreign');
            $table->dropForeign('exercises_id_dificultad_foreign');
            $table->dropForeign('exercises_id_contenido_foreign');
        });
        
    }
}
