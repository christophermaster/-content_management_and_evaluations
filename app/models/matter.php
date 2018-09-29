<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class matter extends Model
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
