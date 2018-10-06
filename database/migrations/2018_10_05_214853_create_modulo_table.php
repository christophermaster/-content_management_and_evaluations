<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');//identificador de la tabla
            $table->integer('id_materia')->unsigned();//identificador de la facultad que pertenece la escuela            
            $table->string('nombre'); //nombre de la Escuela de la universidad de carabobo
            $table->string('descripcion'); //nombre de la Escuela de la universidad de carabobo
            $table->timestamps();
        });

        Schema::table('modules', function($table){
            $table->foreign('id_materia')->references('id')->on('matters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('modules', function($table)
        {
            Schema::dropIfExists('modules');
            $table->dropForeign('modules_id_materia_foreign');
        });
    }
}
