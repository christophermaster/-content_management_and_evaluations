<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryExamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

         Schema::create('histories', function (Blueprint $table) {
            $table->increments('id');//identificador de la tabla
            $table->integer('id_ejercicio')->unsigned()->nullable();
            $table->integer('id_usuario')->unsigned()->nullable();
            $table->Integer('id_motivo')->unsigned()->nullable();
            $table->Integer('id_evaluacion')->unsigned()->nullable();
            $table->date('created_at')->nullable();
        });

        Schema::table('histories', function($table){
            $table->foreign('id_ejercicio')->references('id')->on('exercises')->onDelete('cascade');
            $table->foreign('id_motivo')->references('id')->on('type_evaluations')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_evaluacion')->references('id')->on('temporaryevaluations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('histories', function($table)
        {
            Schema::dropIfExists('histories');
            $table->dropForeign('histories_id_ejercicio_foreign');
            $table->dropForeign('histories_id_motivo_foreign');
            $table->dropForeign('histories_id_usuario_foreign');
            $table->dropForeign('histories_id_evaluacion_foreign');
        });
    }
}
