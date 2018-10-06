<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    protected $table='topics';
    protected $primaryKey='id';

    public $timestamps = false;

    protected $fillable =[
        'nombre',
        'numero_tema',
        'descripcion',
        'id_modulo',
    ];

    protected $guarded =[
    ];
}
