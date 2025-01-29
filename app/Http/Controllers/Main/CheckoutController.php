<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Jobs\Telegram\TelegramChannelMessage;
use App\Http\Requests\Main\Checkout\{CartRequest, CheckoutRequest};
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        $order = Order::create(array_merge($request->validated(), [
            'token' => Hash::make(Str::random(10) . now()->format('YmdHis'))
        ]));

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

        TelegramChannelMessage::dispatch($order)->onConnection('sync');

        return view('main.checkout.cart', [
            'order' => $order,
        ]);
    }
}
