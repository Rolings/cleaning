<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdditionalService;
use App\Models\RoomType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\Admin\RoomType\{StoreRequest, UpdateRequest};

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
        $additionalServices = AdditionalService::onlyActive()
            ->orderBy('id')
            ->get();

        return view('admin.room-type.create', [
            'additionalServices' => $additionalServices
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request, RoomType $roomType): RedirectResponse
    {
        try {
            $roomType->fill($request->all());

            $roomType->save();

            if ($request->has('additional')) {
                $roomType->additional()->sync($request->additional);
            }
        } catch (\Exception $exception) {
            logger()->error($exception->getMessage());
        }

        return redirect()->route('admin.room-types.index');
    }

    /**
     * @param RoomType $roomType
     * @return View
     */
    public function edit(RoomType $roomType): View
    {
        $roomType->load('additional');

        $additionalServices = AdditionalService::onlyActive()
            ->orderBy('id')
            ->get();

        return view('admin.room-type.edit', [
            'item'               => $roomType,
            'additionalServices' => $additionalServices
        ]);
    }

    /**
     * @param Request $request
     * @param RoomType $roomType
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, RoomType $roomType): RedirectResponse
    {
        try {
            $roomType->fill($request->all());

            $roomType->save();

            if ($request->has('additional')) {
                $roomType->additional()->sync($request->additional);
            }
        } catch (\Exception $exception) {
            logger()->error($exception->getMessage());

            return redirect()->back();
        }

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
