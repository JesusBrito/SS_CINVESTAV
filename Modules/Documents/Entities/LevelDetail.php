<?php

namespace Modules\Documents\Entities;

use App\User;
use Modules\Documents\Entities\Level;
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

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function nivel()
    {
        return $this->belongsTo(Level::class, 'id_nivel', 'id_nivel');
    }
}
