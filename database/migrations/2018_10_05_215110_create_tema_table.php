<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');//identificador de la tabla
            $table->integer('id_modulo')->unsigned();//identificador de la facultad que pertenece la escuela
            $table->integer('numero_tema')->unsigned();//identificador de la facultad que pertenece la escuela            
            $table->string('nombre'); //nombre de la Escuela de la universidad de carabobo
            $table->string('descripcion'); //nombre de la Escuela de la universidad de carabobo
            $table->timestamps();
        });

        Schema::table('topics', function($table){
            $table->foreign('id_modulo')->references('id')->on('modules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('topics', function($table)
        {
            Schema::dropIfExists('topics');
            $table->dropForeign('topics_id_modulo_foreign');
        });
    }
}
