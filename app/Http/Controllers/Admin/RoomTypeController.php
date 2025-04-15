<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoomTypeController extends Controller
{
    public function index(): View
    {
        $roomTypes = RoomType::paginate();

        return view('admin.room-type.index', [
            'items' => $roomTypes
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.room-type.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request, RoomType $roomType): RedirectResponse
    {
        $roomType->fill($request->all());

        $roomType->save();

        return redirect()->route('admin.room-types.index');
    }

    /**
     * @param RoomType $roomType
     * @return View
     */
    public function edit(RoomType $roomType): View
    {
        return view('admin.room-type.edit', [
            'item' => $roomType
        ]);
    }

    /**
     * @param Request $request
     * @param RoomType $roomType
     * @return RedirectResponse
     */
    public function update(Request $request, RoomType $roomType): RedirectResponse
    {
        $roomType->fill($request->all());

        $roomType->save();

        return redirect()->route('admin.room-types.index');
    }

    /**
     * @param RoomType $roomType
     * @return RedirectResponse
     */
    public function destroy(RoomType $roomType): RedirectResponse
    {
        $roomType->delete();

        return redirect()->route('admin.room-types.index');
    }
}
