<?php

namespace Modules\Documents\Entities;

use Illuminate\Database\Eloquent\Model;


class LevelDetail extends Model
{
    protected $fillable = [];
    public function user(){
        return $this-> belongsTo('App\User', 'idUsuario')->get();
    }
    public function level(){
        return $this-> belongsTo('Modules\Documents\Entities\Level', 'idNivel', 'idNivel')->get();
	}
}
