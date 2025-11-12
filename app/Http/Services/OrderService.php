<?php

namespace App\Http\Services;

use App\Models\Orders;
use App\Models\Carts;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function Order($userId)
    {
        return DB::transaction(function () use ($userId) {
            $cartItems = Carts::where('user_id', $userId)->with('item')->get();
            if ($cartItems->isEmpty()) {
                throw new \Exception("Cart is empty");
            }

            $order = Orders::create([
                'user_id' => $userId,
                'total' => $cartItems->sum(fn($c) => $c->item->price * $c->quantity),
            ]);

            foreach ($cartItems as $cartItem) {
                $order->items()->attach($cartItem->item_id, ['quantity' => $cartItem->quantity]);
            }

            Carts::where('user_id', $userId)->delete();

            return $order->load('items');
        });
    }

    public function getAllUserOrders($userId)
    {
        return Orders::where('user_id', $userId)->with('items')->get();
    }

    public function getOrderById($userId, $orderId)
    {
        return Orders::where('user_id', $userId)
            ->where('id', $orderId)
            ->with('items')
            ->firstOrFail();
    }
}
