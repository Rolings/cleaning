<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderEntity;
use App\Http\Requests\Main\Checkout\{CheckoutRequest, CartRequest};
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(CartRequest $request): View
    {
        return view('main.checkout.index',
            [
                'requestData' => $request->isMethod('POST') ? $request->validated() : []
            ]
        );
    }

    public function store(CheckoutRequest $request): View
    {
        $order = Order::create($request->validated());

        $request->services->each(function ($service) use ($order) {
            $order->entities()->create([
                'entity_type' => $service->getEntity(),
                'entity_id'   => $service->id,
            ]);
        });

        $request->additional_services->each(function ($service) use ($order) {
            $order->entities()->create([
                'entity_type' => $service->getEntity(),
                'entity_id'   => $service->id,
            ]);
        });

        $order->load('entities.entity');

        return view('main.checkout.cart', [
            'order' => $order,
        ]);
    }
}
