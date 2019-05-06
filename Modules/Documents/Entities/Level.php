<?php

namespace Modules\Documents\Entities;

use Illuminate\Database\Eloquent\Model;


class Level extends Model
{
    protected $fillable = [];

    public function lever(){
        return $this-> hasMany('Modules\Documents\Entities\LevelDetail', 'id_nivel', 'id_nivel')->get();
	}
}


