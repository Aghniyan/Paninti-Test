<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'=>$this->id,
            'shop'=> $this->shop_id,
            'category'=> $this->category_id,
            'name'=> $this->name,
            'price'=> $this->price,
            'stock'=> $this->stock
        ];
    }
}
