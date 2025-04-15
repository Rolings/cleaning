<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Price\{StoreRequest, UpdateRequest};
use App\Models\Price;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $prices = Price::all();

        return view('admin.price.index', [
            'items' => $prices
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.price.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Price $price): RedirectResponse
    {
        $price->fill($request->all());
        $price->save();

        return redirect()->route('admin.prices.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Price $price): View
    {
        return view('admin.price.edit', [
            'item' => $price
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Price $price): RedirectResponse
    {
        $price->fill($request->all());
        $price->save();

        return redirect()->route('admin.prices.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Price $price): RedirectResponse
    {
        $price->delete();

        return redirect()->route('admin.prices.index');
    }
}
