<?php

namespace Modules\Documents\Entities;

use Illuminate\Database\Eloquent\Model;


class Level extends Model
{
    protected $fillable = [];

    public function lever(){
        return $this-> hasMany('Modules\Documents\Entities\LevelDetail', 'idNivel', 'idNivel')->get();
	}
}


