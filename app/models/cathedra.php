<?php

namespace gestion\models;

use Illuminate\Database\Eloquent\Model;

class Cathedra extends Model
{
    //
    protected $table='cathedras';
    protected $primaryKey='id';

    public $timestamps = false;


    protected $fillable =[
        'nombre',
        "descripcion",
        'id_escuela',
        'usuario_creador',
        'usuario_modificador',
        'created_at',
        'updated_at',
    ];

    protected $guarded =[
    ];
    public static function cathedras($id){
        return Cathedra::where('id_escuela','=',$id)
        ->get();
    }
}
