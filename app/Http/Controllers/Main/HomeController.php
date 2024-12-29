<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Service as ModelsService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View
    {
        $services = ModelsService::orderBy('id', 'asc')->limit(4)->get();
        $offers = Offer::orderBy('name', 'asc')->get();

        return \view('main.home.index', [
            'services' => $services,
            'offers'   => $offers
        ]);
    }
}
