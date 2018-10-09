<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    //
    protected $table='peoples';
    protected $primaryKey='id';

    public $timestamps = false;

    protected $fillable =[
        'nombre',
        'apellido',
        'cedula',
        'usuario_creador',
        'usuario_modificador',
        'created_at',
        'updated_at',
    ];

    protected $guarded =[
    ];
}
