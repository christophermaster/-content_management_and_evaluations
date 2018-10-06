<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
    protected $table='modules';
    protected $primaryKey='id';

    public $timestamps = false;

    protected $fillable =[
        'nombre',
        'descripcion',
        'id_materia',
        'usuario_creador',
        'usuario_modificador',
        'created_at',
        'updated_at',
    ];

    protected $guarded =[
    ];
}
