<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    public function users()
    {
        return $this->hasMany(User::class, 'id_tipo_usuario');
    }
}
