<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Sale extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
          'id' => $this->id,
          'quantity' => 5,
          'name' => $this->product->name,
          'img' => $this->img,
          'seller' => $this->seller,
          'description' => $this->description,
          'price_unit' => $this->price_unit,
        ];
    }
}
