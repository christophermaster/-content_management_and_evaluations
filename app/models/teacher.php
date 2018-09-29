<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    //
    protected $table='teachers';
    protected $primaryKey='id';

    public $timestamps = false;

    protected $fillable =[
        'id_materia',
        'id_persona'
    ];

    protected $guarded =[
    ];
}
