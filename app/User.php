<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'imagen',
        'nombre',
        'a_paterno',
        'a_materno',
        'tipo_usuario',
        'celular',
        'fecha_nacimiento',
        'sexo',
        'estatus'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    // ACCESSORS
    public function getNombreCompletoAttribute()
    {
        return "{$this->nombre} {$this->a_paterno}";
    }

    public function getImagenAttribute($value)
    {
        $url = $value ?: 'public/profile_pictures/default-user.png';
        return Storage::url($url);
    }

    // RELATIONS
    public function detailLevel()
    {
        return $this->hasMany('Modules\Documents\Entities\LevelDetail', 'id_usuario')->get();
    }
}
