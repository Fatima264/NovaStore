<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'user_id' => $this->user_id,
            'item_id' => $this->item_id,
            'item_name' => $this->item->name ?? '',
            'quantity' => $this->quantity,
            'price' => $this->item->price ?? 0,
            'subtotal' => $this->subtotal,
            'totals' => $this->totals,

        ];
    }
}
