<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    //
    protected $table='matters';
    protected $primaryKey='id';

    public $timestamps = false;


    protected $fillable =[
        'nombre',
        "descripcion",
        'id_catedra',
        'usuario_creador',
        'usuario_modificador',
        'created_at',
        'updated_at',
    ];

    protected $guarded =[
    ];
    public static function matters($id){
        return Matter::where('id_catedra','=',$id)
        ->get();
    }
}
