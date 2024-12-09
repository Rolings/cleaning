<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\TermCondition;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TermsConditionController extends Controller
{
    public function index(): View
    {
        $item = TermCondition::pageTermsCondition()->first();

        return view('main.seo.terms-condition.index', [
            'item' => $item
        ]);
    }
}
