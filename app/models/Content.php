<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    //
    protected $table='contents';
    protected $primaryKey='id';

    public $timestamps = false;

    protected $fillable =[
        'nombre',
        'descripcion',
        'id_tema',
    ];

    protected $guarded =[
    ];
}
