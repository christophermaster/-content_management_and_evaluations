<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    //
    protected $table='faculties';
    protected $primaryKey='id';

    public $timestamps = false;


    protected $fillable =[
        'nombre',
        'usuario_creador',
        'usuario_modificador',
        'created_at',
        'updated_at',
    ];

    protected $guarded =[
    ];
}
