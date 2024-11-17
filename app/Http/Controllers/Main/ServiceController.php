<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * @return View
     */
    public function index():View
    {
        return \view('main.services.index');
    }

    /**
     * @return View
     */
    public function show(Service $service):View
    {
        return \view('main.services.show',[
            'service' => $service
        ]);
    }
}
