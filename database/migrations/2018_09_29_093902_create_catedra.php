<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatedra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cathedras', function (Blueprint $table) {
            $table->increments('id');//identificador de la tabla
            $table->integer('id_escuela')->unsigned();//identificador de la facultad que pertenece la escuela 
            $table->string('nombre'); //nombre de la Escuela de la universidad de carabobo
            $table->string('descripcion'); //nombre de la Escuela de la universidad de carabobo
            $table->string('usuario_creador');
            $table->string('usuario_modificador');
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });
        
        Schema::table('cathedras', function($table){
            $table->foreign('id_escuela')->references('id')->on('schools')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('cathedras', function($table)
        {
            Schema::dropIfExists('cathedras');
            $table->dropForeign('cathedras_id_escuela_foreign');
        });
    }
}
