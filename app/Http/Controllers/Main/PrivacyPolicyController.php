<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\TermCondition;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;


class PrivacyPolicyController extends Controller
{
    public function index():View
    {
        $item = TermCondition::pagePrivacyPolicy()->first();

        return view('main.seo.privacy-policy.index',[
            'item' => $item
        ]);
    }
}
