<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');//identificador de la tabla
            $table->integer('id_tema')->unsigned();//identificador de la facultad que pertenece la escuela
            $table->string('nombre'); //nombre de la Escuela de la universidad de carabobo
            $table->string('descripcion'); //nombre de la Escuela de la universidad de carabobo
            $table->timestamps();
        });

        Schema::table('contents', function($table){
            $table->foreign('id_tema')->references('id')->on('topics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contents', function($table)
        {
            Schema::dropIfExists('contents');
            $table->dropForeign('contents_id_tema_foreign');
        });
    }
}
