<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Inventory\Entities\Consumable as Consumable;

class CategoryConsumable extends Model
{
    protected $fillable = [];
    public function consumables()
    {
        return $this->hasMany(Consumable::class, "idCategoria");
    }
}
