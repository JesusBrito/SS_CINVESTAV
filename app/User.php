<?php

namespace App;

use App\UserType;
use App\LevelDetail;

use Modules\Documents\Entities\Group;
use Modules\Documents\Entities\Patent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

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

    protected $appends = [
        'nombre_completo'
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

    public function grupoACargo()
    {
        return $this->hasOne(Group::class, 'id_profesor');
    }

    public function detalleNiveles()
    {
        return $this->hasMany(LevelDetail::class, 'id_usuario');
    }

    public function patentes()
    {
        return $this->hasMany(Patent::class, 'id_autor');
    }
}
