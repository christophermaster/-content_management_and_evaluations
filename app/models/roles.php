<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    //
    protected $table='roles';
    protected $primaryKey='id';

    public $timestamps = false;


    protected $fillable =[
        'nombre'
    ];

    protected $guarded =[
    ];
}
