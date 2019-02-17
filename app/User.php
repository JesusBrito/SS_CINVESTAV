<?php

namespace App;

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
        'Correo',
        'password',
        'Imagen',
        'Nombre',
        'A_Paterno',
        'A_Materno',
        'Tipo_Usuario',
        'Celular',
        'Permisos',
        'FechaNac',
        'Sexo',
        'Estatus'
    ];
    protected $primaryKey = 'idUsuario';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    public function getEmailAttribute() {
        return $this->attributes['Correo'];
    }

    public function setEmailAttribute($value) {
        $this->attributes['Correo'] = $value;
    }
    public function getEmailForPasswordReset()
    {
        return $this->Correo;
    }
    
    public function detailLevel(){
        return $this-> hasMany('Modules\Documents\Entities\LevelDetail', 'idUsuario')->get();
	}
}
