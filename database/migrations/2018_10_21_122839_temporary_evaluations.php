<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TemporaryEvaluations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('temporaryEvaluations', function (Blueprint $table) {
            $table->increments('id');//identificador de la tabla
            $table->integer('id_facultad');
            $table->string('facultad');
            $table->integer('id_escuela');
            $table->string('escuela');
            $table->integer('id_catedra');
            $table->string('catedra');
            $table->integer('id_materia');
            $table->string('materia');
            $table->integer('id_tema');
            $table->string('tema');
            $table->string('numero_evaluacion');
            $table->integer('id_tipo_evaluacion');
            $table->string('nombre_tipo_evaluacion');
            $table->integer('id_subtipo_evaluacion');
            $table->string('nombre_subtipo_evaluacion');
            $table->string('fecha');
            $table->boolean('aprobado');
            $table->integer('id_usuario');
            $table->string('usuario_creador');
            $table->string('usuario_modificador');
            $table->boolean('impreso')->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temporaryEvaluations');
    }
}
