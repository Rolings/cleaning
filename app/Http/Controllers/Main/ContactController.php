<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Callback;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\Main\Callback\StoreRequest;

class ContactController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('main.contact.index');
    }

    /**
     * @param Request $request
     */
    public function store(StoreRequest $request)
    {
        try {
            Callback::create([
                'name'    => $request->name,
                'phone'   => $request->name,
                'comment' => $request->message,
                'is_read' => false,
            ]);

        } catch (\Exception $exception) {

            logger()->error($exception->getMessage());

            return response()->json(['status' => 'error', 'message' => 'Something wrong, try again'], 404);
        }

        return response()->json(['status' => 'success', 'message' => 'Your message has been sent.']);
    }
}
