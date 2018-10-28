<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Favorite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('favorites', function (Blueprint $table) {
            $table->increments('id');//identificador de la tabla
            $table->integer('id_usuario')->unsigned();//identificador de la facultad que pertenece la escuela
            $table->integer('id_ejercicio')->unsigned()->nullable();
            $table->integer('id_solucion')->unsigned()->nullable();
            $table->integer('id_archivo')->unsigned()->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });

        Schema::table('favorites', function($table){
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_ejercicio')->references('id')->on('exercises')->onDelete('cascade');
            $table->foreign('id_solucion')->references('id')->on('solutions')->onDelete('cascade');
            $table->foreign('id_archivo')->references('id')->on('uploads')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('favorites', function($table)
        {
            Schema::dropIfExists('favorites');
            $table->dropForeign('favorites_id_usuario_foreign');
            $table->dropForeign('favorites_id_ejercicio_foreign');
            $table->dropForeign('favorites_id_solucion_foreign');
            $table->dropForeign('favorites_id_archivo_foreign');
        });
    }
}
