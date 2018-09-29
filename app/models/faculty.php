<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class faculty extends Model
{
    //
    protected $table='faculties';
    protected $primaryKey='id';

    public $timestamps = false;


    protected $fillable =[
        'nombre'
    ];

    protected $guarded =[
    ];
}
