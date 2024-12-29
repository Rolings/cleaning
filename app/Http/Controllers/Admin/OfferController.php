<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Offer\StoreOfferRequest;
use App\Http\Requests\Admin\Offer\UpdateOfferRequest;
use App\Models\Offer;
use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Offer::orderBy('created_at')
            ->paginate(15);

        return view('admin.offers.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $services = Service::onlyActive()->orderBy('name')->get();

        return view('admin.offers.create', [
            'services' => $services
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOfferRequest $request, Offer $offer): RedirectResponse
    {
        $offer->fill($request->validated())->save();

        if ($request->has('services')) {
            $offer->services()->sync($request->services);
        }

        return redirect()->route('admin.offers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer): View
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer): View
    {
        $offer->load(['services']);

        $services = Service::onlyActive()->orderBy('name')->get();

        return view('admin.offers.edit', [
            'item'     => $offer,
            'services' => $services
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOfferRequest $request, Offer $offer): RedirectResponse
    {

        $offer->fill($request->validated())->save();

        if ($request->has('services')) {
            $offer->services()->sync($request->services);
        }

        return redirect()->route('admin.offers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer): RedirectResponse
    {
        $offer->services()->detach();

        $offer->delete();

        return redirect()->route('admin.offers.index');
    }
}
