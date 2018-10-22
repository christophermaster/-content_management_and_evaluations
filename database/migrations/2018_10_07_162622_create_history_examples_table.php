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

         Schema::create('history_examples', function (Blueprint $table) {
            $table->increments('id');//identificador de la tabla
            $table->integer('id_ejercicio')->unsigned();
            $table->Integer('id_motivo')->unsigned();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });

        Schema::table('history_examples', function($table){
            $table->foreign('id_ejercicio')->references('id')->on('exercises')->onDelete('cascade');
            $table->foreign('id_motivo')->references('id')->on('type_evaluations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('history_examples', function($table)
        {
            Schema::dropIfExists('history_examples');
            $table->dropForeign('history_examples_id_ejercicio_foreign');
            $table->dropForeign('history_examples_id_motivo_foreign');
        });
    }
}
