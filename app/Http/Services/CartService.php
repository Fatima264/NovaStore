<?php

namespace App\Http\Services;

use App\Models\Carts;
use App\Models\Items;
use Illuminate\Support\Facades\DB;

class CartService
{
    public function addToCart($userId, $itemId, $quantity)
    {
        $item = Items::findOrFail($itemId);

        $cart = Carts::updateOrCreate(
            ['user_id' => $userId, 'item_id' => $itemId],
            ['quantity' => DB::raw("quantity + $quantity")]
        );

        return $cart->load('item');
    }

    public function removeFromCart($userId, $itemId)
    {
        $cart = Carts::where('user_id', $userId)->where('item_id', $itemId)->firstOrFail();
        $cart->delete();
        return $cart;
    }
}
