<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');//identificador de la tabla
            $table->integer('id_materia')->unsigned();//identificador de la facultad que pertenece la escuela          
            $table->integer('id_persona')->unsigned();
            $table->string('usuario_creador');
            $table->string('usuario_modificador');
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });

        Schema::table('teachers', function($table){
           $table->foreign('id_materia')->references('id')->on('matters')->onDelete('cascade');
           $table->foreign('id_persona')->references('id')->on('peoples')->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('teachers', function($table)
        {
            Schema::dropIfExists('teachers');
            $table->dropForeign('teachers_id_materia_foreign');
            $table->dropForeign('teachers_id_persona_foreign');

        });
    }
}
