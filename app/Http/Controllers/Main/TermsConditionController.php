<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TermsConditionController extends Controller
{
    public function index():View
    {
        return view('main.seo.terms-condition.index');
    }
}
