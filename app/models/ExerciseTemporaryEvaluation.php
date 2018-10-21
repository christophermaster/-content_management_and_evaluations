<?php

namespace gestion\models;
use Illuminate\Database\Eloquent\Model;

class ExerciseTemporaryEvaluation extends Model
{
    //
    protected $table='exercisetemporaryevaluations';
    protected $primaryKey='id';

    public $timestamps = false;

    protected $fillable =[
        'id',
        'id_temporal_evaluation',
        'id_ejercicio',
        'created_at',
        'updated_at',
    ];

    protected $guarded =[
    ];
}
