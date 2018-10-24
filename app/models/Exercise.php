<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    //
    protected $table='exercises';
    protected $primaryKey='id';

    public $timestamps = false;

    protected $fillable =[
        'contenido',
        'aprobado',
        'id_usuario',
        'id_tema',
        'tema',
        'id_escuela',
        'escuela',
        'id_materia',
        'materia',
        'id_facultad',
        'facultad',
        'id_catedra',
        'catedra',
        'id_dificultad',
        'dificultad',
        'id_tipo', 
        'tipo_nombre',
        'id_contenido',
        'nombre_contenido',
        'usuario_creador',
        'usuario_modificador',
        'usado',
        'created_at',
        'updated_at',
    ];

    protected $guarded =[
    ];

}
