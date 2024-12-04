<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\History\StoreHistoryRequest;
use App\Http\Requests\Admin\History\UpdateHistoryRequest;
use App\Models\History;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $histories = History::orderBy('event_date_at')->paginate(20);

        return view('admin.history.index', [
            'items' => $histories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.history.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHistoryRequest $request): RedirectResponse
    {
        History::create($request->validated());

        return redirect()->route('admin.history.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(History $history): View
    {
        return view('admin.history.edit', [
            'item' => $history
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHistoryRequest $request, History $history): RedirectResponse
    {
        $history->update($request->validated());

        return redirect()->route('admin.history.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(History $history): RedirectResponse
    {
        $history->delete();

        return redirect()->route('admin.history.index');
    }
}
