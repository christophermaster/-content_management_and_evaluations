<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //
    protected $table='favorites';
    protected $primaryKey='id';

    public $timestamps = false;


    protected $fillable =[
        'id_usuario',
        'id_ejercicio',
        'id_solucion',
        'id_archivo',
    ];

    protected $guarded =[
    ];
}
