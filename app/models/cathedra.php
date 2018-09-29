<?php

namespace gestion\model;

use Illuminate\Database\Eloquent\Model;

class cathedra extends Model
{
    //
    protected $table='cathedras';
    protected $primaryKey='id';

    public $timestamps = false;


    protected $fillable =[
        'nombre',
        'id_escuela'
    ];

    protected $guarded =[
    ];
}