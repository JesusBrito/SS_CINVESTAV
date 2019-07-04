<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Inventory\Entities\Unity as Unity;

class Temperature extends Model
{
    protected $fillable = [];

    public function unity()
    {
        return $this->belongsTo(Unity::class, 'idUnidad');
    }
}
