<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('id_persona')->unsigned();//identificador de la facultad que pertenece la escuela 
            $table->integer('id_cargo')->unsigned();//identificador de la facultad que pertenece la escuela           
            $table->string('email')->unique();
            $table->string('password');
            $table->string('usuario_creador');
            $table->string('usuario_modificador');
            $table->rememberToken();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });

        Schema::table('users', function($table){
            $table->foreign('id_persona')->references('id')->on('peoples')->onDelete('cascade');
            $table->foreign('id_cargo')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('users', function($table)
        {
            Schema::dropIfExists('users');
            $table->dropForeign('users_id_persona_foreign');
            $table->dropForeign('users_id_cargo_foreign');
        });
       
    }
}
