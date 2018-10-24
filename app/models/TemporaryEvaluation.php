<?php

namespace gestion\models;
use Illuminate\Database\Eloquent\Model;

class TemporaryEvaluation extends Model
{
    //
    protected $table='temporaryEvaluations';
    protected $primaryKey='id';

    public $timestamps = false;

    protected $fillable =[
        'id',
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
        'numero_evaluacion',
        'id_tipo_evaluacion',
        'nombre_tipo_evaluacion',
        'id_subtipo_evaluacion', 
        'nombre_subtipo_evaluacion',
        'fecha',
        'id_usuario',
        'usuario_creador',
        'usuario_modificador',
        'impreso',
        'created_at',
        'updated_at',
    ];

    protected $guarded =[
    ];
}
