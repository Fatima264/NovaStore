<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Http\Resources\CartResource;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    
    public function addToCart(Request $request)
    {
        $cart = $this->cartService->addToCart(
            $request->user()->id, $request->item_id, $request->quantity
    );
        return new CartResource($cart);
    }

    public function removeFromCart(Request $request, $itemId)
    {
        $cart = $this->cartService->removeFromCart($request->user()->id, $itemId);
        return new CartResource($cart);
    }
}
