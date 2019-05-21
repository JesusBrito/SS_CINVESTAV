<?php

namespace App;

use App\User;
use App\Level;
use Illuminate\Database\Eloquent\Model;

class LevelDetail extends Model
{
    protected $fillable = [
        'carrera',
        'escuela',
        'fecha_inicio',
        'fecha_fin',
        'estatus',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function nivel()
    {
        return $this->belongsTo(Level::class, 'id_nivel');
    }
}
