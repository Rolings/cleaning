<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\Main\Checkout\{CheckoutRequest,CartRequest};
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

    public function checkout(CheckoutRequest $request): View
    {
        $order = Order::create($request->validated());

        dd($order);

        return view('main.checkout.cart');
    }

    public function store(CartRequest $request): View
    {

    }
}
