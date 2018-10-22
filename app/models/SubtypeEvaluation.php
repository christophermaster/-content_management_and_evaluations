<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class SubtypeEvaluation extends Model
{
    protected $table='subtype_evaluations';
    protected $primaryKey='id';

    public $timestamps = false;


    protected $fillable =[
        'nombre',
    ];

    protected $guarded =[
    ];
}
