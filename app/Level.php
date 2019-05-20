<?php

namespace App;

use App\LevelDetail;
use Illuminate\Database\Eloquent\Model;


class Level extends Model
{
    protected $fillable = [];

    public function lever(){
        return $this->hasMany(LevelDetail::class, 'id_nivel', 'id_nivel')->get();
	}
}


