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
        'id_tema',
        'tema',
        'ruta',
        'titulo',
        'id_escuela',
        'escuela',
        'id_materia',
        'materia',
        'id_facultad',
        'facultad',
        'id_catedra',
        'catedra',
        'id_tipo', 
        'tipo_nombre',
        'usuario_creador',
        'usuario_modificador',
        'created_at',
        'updated_at',
    ];

    protected $guarded =[
    ];

}
