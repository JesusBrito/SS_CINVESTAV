<?php

namespace Modules\Inventory\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class BrandsController extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http["brands"=>$brands]\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
