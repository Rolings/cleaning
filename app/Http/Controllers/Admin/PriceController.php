<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Price\{StoreRequest, UpdateRequest};
use App\Models\{Price, RoomType, Service};
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $prices = Price::with(['service', 'roomType'])
            ->orderByDesc('service_id')
            ->orderByDesc('room_type_id')
            ->paginate();

        return view('admin.price.index', [
            'items' => $prices
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.price.create', [
            'services'  => Service::onlyActive()->get(),
            'roomTypes' => RoomType::onlyActive()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Price $price): RedirectResponse
    {
        try {
            $price->fill($request->all());
            $price->save();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }

        return redirect()->route('admin.prices.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Price $price): View
    {

        return view('admin.price.edit', [
            'item'      => $price,
            'services'  => Service::onlyActive()->get(),
            'roomTypes' => RoomType::onlyActive()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Price $price): RedirectResponse
    {
        try {
            $price->fill($request->all());
            $price->save();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }

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
