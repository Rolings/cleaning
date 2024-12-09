<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\TermCondition;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CookiesController extends Controller
{
    public function index(): View
    {
        $item = TermCondition::pageCookies()->first();

        return view('main.seo.cookies.index', [
            'item' => $item
        ]);
    }
}
