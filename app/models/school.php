<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    //
    protected $table='schools';
    protected $primaryKey='id';

    public $timestamps = false;

    protected $fillable =[
        'nombre',
        'descripcion',
        'id_facultad',
        'usuario_creador',
        'usuario_modificador',
        'created_at',
        'updated_at',
    ];

    protected $guarded =[
    ];
    public static function schools($id){
        return School::where('id_facultad','=',$id)
        ->get();
    }
}
