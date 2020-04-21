<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Commande extends JsonResource
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
            'quantity' => $this->quantity,
            'name' => $this->sales->product->name,
            'state' =>$this->state,
            'img' => $this->sales->img,
            'seller' => $this->sales->seller->user,
            'total' => $this->total,
            'option' => $this->payment_option
        ];
    }
}
