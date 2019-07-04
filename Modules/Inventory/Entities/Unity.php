<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Inventory\Entities\Temperature as Temperature;


class Unity extends Model
{
    protected $fillable = [];

    public function temperature()
    {
        return $this->hasMany(Temperature::class, "idUnidad");
    }
}
