<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Callback\StoreCallbackRequest;
use App\Http\Requests\Callback\UpdateCallbackRequest;
use App\Models\Callback;
use Illuminate\Http\Request;

class CallbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $callbacks = Callback::when($request->route()->named('admin.callbacks.index.new'), function ($query) use ($request) {
            return $query->unread();
        })->when($request->route()->named('admin.callbacks.index.read'), function ($query) use ($request) {
            return $query->read();
        })
            ->orderByDesc('created_at')
            ->paginate(10);


        return view('admin.callbacks.index', [
            'callbacks' => $callbacks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCallbackRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Callback $callback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Callback $callback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCallbackRequest $request, Callback $callback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Callback $callback)
    {
        //
    }
}
