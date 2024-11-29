<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Callback\StoreCallbackRequest;
use App\Http\Requests\Callback\UpdateCallbackRequest;
use App\Models\Callback;

class CallbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $callbacks = Callback::all();

        return view('admin.callbacks.index',[
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
