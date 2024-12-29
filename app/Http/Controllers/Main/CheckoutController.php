<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Checkout\IndexCheckout;

class CheckoutController extends Controller
{
    public function index(IndexCheckout $request)
    {
        return view('main.checkout.index',
            [
                'requestData' => $request->isMethod('POST') ? $request->validated() : []
            ]
        );
    }
}
