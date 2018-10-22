<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExerciseTemporaryEvaluations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exerciseTemporaryEvaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_temporal_evaluation')->unsigned();
            $table->integer('id_ejercicio');
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });
        Schema::table('exerciseTemporaryEvaluations', function($table){
            $table->foreign('id_temporal_evaluation')->references('id')->on('temporaryEvaluations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exerciseTemporaryEvaluations', function($table)
        {
            Schema::dropIfExists('exerciseTemporaryEvaluations');
            $table->dropForeign('exerciseTemporaryEvaluations_id_temporal_evaluation_foreign');
        });
    }
}
