<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdditionalService;
use App\Models\Service;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\Order\{StoreOrderRequest, UpdateOrderRequest};
use App\Http\Resources\Admin\Order\ShowResource;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orders = Order::when($request->route()->named('admin.orders.index.new'), function ($query) use ($request) {
            return $query->unread();
        })->when($request->route()->named('admin.orders.index.read'), function ($query) use ($request) {
            return $query->read();
        })->when($request->has('search'), function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->get('search') . '%')
                ->orWhere('phone', 'like', '%' . $request->get('search') . '%');
        })
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('admin.orders.index', [
            'items' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request): RedirectResponse
    {
        $order = Order::create(array_merge($request->validated(), [
            'token' => Hash::make(Str::random(10) . now()->format('YmdHis'))
        ]));

        if (!is_null($request->services)) {
            Service::onlyActive()
                ->find($request->services)
                ->each(function ($service) use ($order) {
                    $order->entities()->create([
                        'entity_type' => $service->getEntity(),
                        'entity_id'   => $service->id,
                    ]);
                });
        }


        if (!is_null($request->additional_services)) {
            AdditionalService::onlyActive()->find($request->additional_services)
                ->each(function ($service) use ($order) {
                    $order->entities()->create([
                        'entity_type' => $service->getEntity(),
                        'entity_id'   => $service->id,
                    ]);
                });
        }

        return redirect()->route('admin.orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order): JsonResource
    {
        $order->update(['is_read' => true]);

        $order->load(['offer', 'state', 'entities.entity']);

        return new ShowResource($order);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order): View
    {
        $order->load(['offer', 'state', 'entities.entity']);

        return view('admin.orders.edit', [
            'item' => $order,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order): RedirectResponse
    {
        $order->update($request->validated());

        $order->entities()->delete();

        if (!is_null($request->services)) {
            Service::onlyActive()
                ->find($request->services)
                ->each(function ($service) use ($order) {
                    $order->entities()->create([
                        'entity_type' => $service->getEntity(),
                        'entity_id'   => $service->id,
                    ]);
                });
        }


        if (!is_null($request->additional_services)) {
            AdditionalService::onlyActive()->find($request->additional_services)
                ->each(function ($service) use ($order) {
                    $order->entities()->create([
                        'entity_type' => $service->getEntity(),
                        'entity_id'   => $service->id,
                    ]);
                });
        }

        return redirect()->route('admin.orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();

        return redirect()->route('admin.orders.index');
    }
}
