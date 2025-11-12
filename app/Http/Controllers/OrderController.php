<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\OrderService;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function order(Request $request)
    {
        $order = $this->orderService->order($request->user()->id);
        return new OrderResource($order);
    }

    public function getAllUserOrders(Request $request)
    {
        $orders = $this->orderService->getAllUserOrders($request->user()->id);
        return OrderResource::collection($orders);
    }

    // 5. Get order by id
    public function getOrderById(Request $request, $orderId)
    {
        $order = $this->orderService->getOrderById($request->user()->id, $orderId);
        return new OrderResource($order);
    }
}
