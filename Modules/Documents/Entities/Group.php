<?php

namespace Modules\Documents\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public function profesor()
    {
        return $this->belongsTo(User::class, 'id_profesor');
    }

    public function alumnos()
    {
        return $this->belongsToMany(User::class, 'group_user', 'id_grupo', 'id_usuario');
    }
}
