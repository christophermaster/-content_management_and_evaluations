<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    //
    protected $table='matters';
    protected $primaryKey='id';

    public $timestamps = false;


    protected $fillable =[
        'nombre',
        'id_catedra'
    ];

    protected $guarded =[
    ];
}
