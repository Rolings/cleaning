<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Contracts\View\View;

class AboutController extends Controller
{
    public function index():View
    {
        $history = History::orderByDesc('event_date_at')->get();

        return \view('main.about.index',[
            'history' => $history,
        ]);
    }
}
