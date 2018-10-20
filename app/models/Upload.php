<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    //
    protected $table='uploads';
    protected $primaryKey='id';

    public $timestamps = false;

    protected $fillable =[
        'id_usuario',
        'aprobado',
        'ruta',
        'titulo',
        'dscripcion',
        'id_facultad',
        'facultad',
        'id_escuela',
        'escuela',
        'id_catedra',
        'catedra',
        'id_materia',
        'materia',
        'id_tema',
        'tema',
        'id_contenido',
        'contenido',
        'id_categoria',
        'categoria',
        'usuario_creador',
        'usuario_modificador',
        'created_at',
        'updated_at',
        'tipo_archivo',
    ];

    protected $guarded =[
    ];

}
