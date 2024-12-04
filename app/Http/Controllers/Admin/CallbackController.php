<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Callback\ShowResource;
use App\Models\Callback;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CallbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $callbacks = Callback::when($request->route()->named('admin.callbacks.index.new'), function ($query) use ($request) {
            return $query->unread();
        })->when($request->route()->named('admin.callbacks.index.read'), function ($query) use ($request) {
            return $query->read();
        })->when($request->has('search'), function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->get('search') . '%')
                ->orWhere('phone', 'like', '%' . $request->get('search') . '%');
        })->orderByDesc('created_at')->paginate(10);

        return view('admin.callbacks.index', [
            'items' => $callbacks
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Callback $callback): JsonResource
    {
        $callback->update(['is_read' => true]);

        return new ShowResource($callback);
    }
}
