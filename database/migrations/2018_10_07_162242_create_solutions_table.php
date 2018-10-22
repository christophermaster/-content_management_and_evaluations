<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->increments('id');//identificador de la tabla
            $table->integer('id_usuario')->unsigned();//identificador de la facultad que pertenece la escuela
            $table->string('usuario_creador');
            $table->string('usuario_modificador');
            $table->longText('contenido'); //nombre de la Escuela de la universidad de carabobo
            $table->boolean('aprobado');
            $table->integer('id_ejercicio')->unsigned();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });

        Schema::table('solutions', function($table){
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_ejercicio')->references('id')->on('exercises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solutions', function($table)
        {
            Schema::dropIfExists('solutions');
            $table->dropForeign('solutions_id_usuario_foreign');
            $table->dropForeign('solutions_id_ejercicio_foreign');
        });
    }
}
