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
        'usuario_creador',
        'usuario_modificador',
        'created_at',
        'updated_at',
    ];

    protected $guarded =[
    ];

    public static function contents($id){
        return Content::where('id_tema','=',$id)
        ->get();
    }
}
