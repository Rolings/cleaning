<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Callback;
use App\Models\Order;
use App\Models\Project;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Laracasts\Utilities\JavaScript\JavaScriptFacade as JavaScript;
use Carbon\CarbonPeriod;

class DashboardController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $projects = Project::all();
        $orders = Order::all();
        $callbacks = Callback::all();

        $orderGroupByMonth = $orders->groupBy(function ($order) {
            return $order->created_at->format('F');
        })->map(function ($group) {
            return $group->count();
        });

        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();

        $period = CarbonPeriod::create($startOfMonth, '1 day', $endOfMonth);

        $currentMountDay = collect($period)->map(function ($date) {
            return (int)$date->format('d');
        })->toArray();

        JavaScript::put([
            'currentMountDay'   => $currentMountDay,
            'orderGroupByMonth' => $orderGroupByMonth,
            'orderGroupDays'    => $this->sortPrepareData($orders, $startOfMonth, $endOfMonth),
            'callbackGroupDays' => $this->sortPrepareData($callbacks, $startOfMonth, $endOfMonth),
        ]);

        return view('admin.dashboard.index', [
            'services'  => $services,
            'projects'  => $projects,
            'orders'    => $orders,
            'callbacks' => $callbacks,

        ]);
    }

    /**
     * Function sort data
     *
     * @param Collection $collection
     * @param Carbon $startOfMonth
     * @param Carbon $endOfMonth
     * @return Collection
     */
    private function sortPrepareData(Collection $collection, Carbon $startOfMonth, Carbon $endOfMonth): Collection
    {
        return $collection->filter(function ($order) use ($startOfMonth, $endOfMonth) {
            return $order->created_at >= $startOfMonth && $order->created_at <= $endOfMonth;
        })->groupBy(function ($order) {
            return $order->created_at->format('d');
        })->map(function ($group) {
            return $group->count();
        })->mapWithKeys(function ($value, $key) {
            return [(int)$key => $value];
        })->sortKeys();
    }
}
