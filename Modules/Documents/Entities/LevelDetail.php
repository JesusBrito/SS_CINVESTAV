<?php

namespace Modules\Documents\Entities;

use Illuminate\Database\Eloquent\Model;


class LevelDetail extends Model
{
    protected $fillable = [
        'id_usuario',
        'id_nivel',
        'carrera',
        'escuela',
        'ingreso',
        'egreso',
        'estatus',
    ];
    public function user(){
        return $this-> belongsTo('App\User', 'id_usuario')->get();
    }
    public function level(){
        return $this-> belongsTo('Modules\Documents\Entities\Level', 'id_nivel', 'id_nivel')->get();
	}
}
