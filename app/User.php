<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Modules\Documents\Entities\{ Group, Patent };
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\{ BelongsTo, HasOne, HasMany};

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
        'celular',
        'fecha_nacimiento',
        'sexo',
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

    protected $with = [
        'userType',
        'levelDetail',
    ];

    /*
    |--------------------------------------------------------------------------
    | Accessors and Mutators
    |--------------------------------------------------------------------------
    */

    public function getNombreCompletoAttribute() : string
    {
        return "{$this->nombre} {$this->a_paterno}";
    }

    public function getImagenAttribute($value)
    {
        $url = $value ?: 'default/user.png';
        return Storage::url($url);
    }

    /*
    |--------------------------------------------------------------------------
    | Eloquent Model Relationships
    |--------------------------------------------------------------------------
    */

    public function userType() : BelongsTo
    {
        return $this->belongsTo(UserType::class, 'id_tipo_usuario');
    }

    public function group() : HasOne
    {
        return $this->hasOne(Group::class, 'id_profesor');
    }

    public function levelDetail() : HasMany
    {
        return $this->hasMany(LevelDetail::class, 'id_usuario');
    }

    public function patent() : HasMany
    {
        return $this->hasMany(Patent::class, 'id_autor');
    }
}
