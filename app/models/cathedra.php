<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class Cathedra extends Model
{
    //
    protected $table='cathedras';
    protected $primaryKey='id';

    public $timestamps = false;


    protected $fillable =[
        'nombre',
        "descripcion",
        'id_escuela'
    ];

    protected $guarded =[
    ];
}
