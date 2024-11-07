<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index():View
    {
        return \view('main.contact.index');
    }
}