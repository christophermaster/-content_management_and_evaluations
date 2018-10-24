<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table='histories';
    protected $primaryKey='id';

    public $timestamps = false;


    protected $fillable =[
        'id_usuario',
        'id_ejercicio',
        'id_motivo',
        'id_evaluacion',
        'created_at',

    ];

    protected $guarded =[
    ];
}
