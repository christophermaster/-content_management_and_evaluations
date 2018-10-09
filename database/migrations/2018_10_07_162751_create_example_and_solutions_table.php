<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExampleAndSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('example_and_solutions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ejercicio')->unsigned();
             $table->integer('id_solucion')->unsigned();
            $table->timestamps();
        });
        
        Schema::table('example_and_solutions', function($table){
            $table->foreign('id_ejercicio')->references('id')->on('exercises')->onDelete('cascade');
            $table->foreign('id_solucion')->references('id')->on('solutions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('example_and_solutions', function($table)
        {
            Schema::dropIfExists('example_and_solutions');
            $table->dropForeign('example_and_solutions_id_ejercicio_foreign');
            $table->dropForeign('example_and_solutions_id_solucion_foreign');
        });
    }
}
