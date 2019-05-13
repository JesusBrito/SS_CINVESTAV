<?php

namespace App;

use App\UserType;
use Modules\Documents\Entities\LevelDetail;

use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        $url = $value ?: 'default/user.png';
        return Storage::url($url);
    }

    // RELATIONS
    public function tipoUsuario()
    {
        return $this->belongsTo(UserType::class, 'id_tipo_usuario');
    }

    public function detalleNiveles()
    {
        return $this->hasMany(LevelDetail::class, 'id_usuario');
    }
}
