<?php

namespace Modules\Documents\Entities;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Patent extends Model
{
    protected $fillable = [
        'nombre',
        'pais',
        'fecha_solicitud',
        'fecha_registro',
        'fecha_expiracion',
        'numero',
        'descripcion',
        'documento'
    ];

    public function getDocumentoAttribute($value)
    {
        return $value ? Storage::url($value) : '';
    }

    public function autor()
    {
        return $this->belongsTo(User::class, 'id_autor');
    }

    public function coautores()
    {
        return DB::table('patent_coauthor')
                    ->whereIdPatente($this->id)
                    ->get();
    }

    // public function coautores()
    // {
    //     return $this->belongsToMany(Author::class, 'patent_coauthor', 'id_patente', 'id_coautor');
    // }
}
