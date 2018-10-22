<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class TypeEvaluation extends Model
{
    protected $table='type_evaluations';
    protected $primaryKey='id';

    public $timestamps = false;


    protected $fillable =[
        'nombre',  
    ];

    protected $guarded =[
    ];
}
