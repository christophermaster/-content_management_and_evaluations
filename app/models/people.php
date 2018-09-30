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
        'cedula'
    ];

    protected $guarded =[
    ];
}
