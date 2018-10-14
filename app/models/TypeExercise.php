<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class TypeExercise extends Model
{
    protected $table='typeexercises';
    protected $primaryKey='id';

    public $timestamps = false;


    protected $fillable =[
        'nombre',
        
    ];

    protected $guarded =[
    ];
}
