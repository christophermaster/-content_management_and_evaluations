<?php

namespace gestion;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    //
    protected $table='contenido';
    protected $primaryKey='id';

    public $timestamps = false;


    protected $fillable =[
        'contenido',
        'id_user'
    ];

    protected $guarded =[
    ];
}
