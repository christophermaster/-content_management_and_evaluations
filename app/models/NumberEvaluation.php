<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class NumberEvaluation extends Model
{
    //
    protected $table='number_evaluations';
    protected $primaryKey='id';

    public $timestamps = false;


    protected $fillable =[
        'nombre',
    ];

    protected $guarded =[
    ];
}
