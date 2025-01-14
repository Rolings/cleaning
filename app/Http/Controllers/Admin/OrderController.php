<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\StoreOrderRequest;
use App\Http\Requests\Admin\Order\UpdateOrderRequest;
use App\Models\Offer;
use App\Models\Order;
use App\Models\State;
use App\Models\Service;
use App\Models\AdditionalService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\Order\ShowResource;

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
    public function create()
    {
        $states = State::onlyActive()->get();
        $offers = Offer::onlyActive()->get();
        $services = Service::onlyActive()->get();
        $additionalServices = AdditionalService::onlyActive()->get();

        return view('admin.orders.create', [
            'states'                     => $states,
            'offers'                     => $offers,
            'services'                   => $services,
            'additionalServices'         => $additionalServices,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
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
    public function edit(Order $order)
    {
        $order->load(['offer', 'state', 'entities.entity']);

        [$selectedServices, $selectedAdditionalServices] = $order
            ->entities
            ->map(fn($items) => $items->entity)
            ->partition(fn($items) => $items instanceof Service);


        $states = State::onlyActive()->get();
        $offers = Offer::onlyActive()->get();
        $services = Service::onlyActive()->get();
        $additionalServices = AdditionalService::onlyActive()->get();

        return view('admin.orders.edit', [
            'item'                       => $order,
            'states'                     => $states,
            'offers'                     => $offers,
            'services'                   => $services,
            'additionalServices'         => $additionalServices,
            'selectedServices'           => $selectedServices,
            'selectedAdditionalServices' => $selectedAdditionalServices
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index');
    }
}
