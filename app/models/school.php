<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    //
    protected $table='schools';
    protected $primaryKey='id';

    public $timestamps = false;

    protected $fillable =[
        'nombre',
        'id_facultad'
    ];

    protected $guarded =[
    ];
}
