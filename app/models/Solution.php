<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
     //
    protected $table='solutions';
    protected $primaryKey='id';

    public $timestamps = false;


    protected $fillable =[
        'id_usuario',
        'id_ejercicio',
        'contenido',
        'aprobado',
        'usuario_creador',
        'usuario_modificador',
        'created_at',
        'updated_at',
    ];

    protected $guarded =[
    ];
}
