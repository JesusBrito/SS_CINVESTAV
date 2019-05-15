<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Inventory\Entities\CategoryConsumable as CategoryConsumable;

class Consumable extends Model
{
    protected $fillable = [];

    public function categoryConsumable()
    {
        return $this->hasOne(CategoryConsumable::class, "id");
    }
}
