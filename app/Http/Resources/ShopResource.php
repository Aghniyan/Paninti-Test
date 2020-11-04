<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
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
            'name'=> $this->name,
            'contact'=> $this->contact,
            'address'=> $this->address,
            'info'=> $this->info,
            'admin'=> new UserResource($this->user)
        ];
    }
}
