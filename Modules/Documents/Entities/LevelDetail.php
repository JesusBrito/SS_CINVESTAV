<?php

namespace Modules\Documents\Entities;

use Illuminate\Database\Eloquent\Model;


class LevelDetail extends Model
{
    protected $fillable = [
        'idUsuario',
        'idNivel',
        'Carrera',
        'Escuela',
        'Ingreso',
        'Egreso',
        'Estatus',
    ];
    public function user(){
        return $this-> belongsTo('App\User', 'idUsuario')->get();
    }
    public function level(){
        return $this-> belongsTo('Modules\Documents\Entities\Level', 'idNivel', 'idNivel')->get();
	}
}
