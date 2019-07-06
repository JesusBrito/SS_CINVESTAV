<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LevelDetail extends Model
{
    protected $fillable = [
        'carrera',
        'escuela',
        'fecha_inicio',
        'fecha_fin',
        'estatus',
    ];

    /*
    |--------------------------------------------------------------------------
    | Accessors and Mutators
    |--------------------------------------------------------------------------
    */

    public function getEntraceAttribute()
    {
        return $this->fecha_inicio;
    }

    public function getEndsAttribute()
    {
        return $this->fecha_fin;
    }

    /*
    |--------------------------------------------------------------------------
    | Eloquent Model Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nivel() : BelongsTo
    {
        return $this->belongsTo(Level::class, 'id_nivel');
    }
}
