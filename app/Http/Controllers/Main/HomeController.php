<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\{Question, Service};
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $services = Service::onlyActive()
            ->orderBy('id', 'asc')
            ->get();

        $questions = Question::onlyTop()
            ->onlyActive()
            ->orderBy('created_at')
            ->limit(5)
            ->get();

        return \view('main.home.index', [
            'services'  => $services,
            'questions' => $questions,
        ]);
    }
}
