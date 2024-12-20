<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Service $service)
    {

        return view('main.checkout.index', [
            'service' => $service
        ]);
    }
}
