<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;


class PrivacyPolicyController extends Controller
{
    public function index():View
    {
        return view('main.seo.privacy-policy.index');
    }
}
