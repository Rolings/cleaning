<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdditionalService\StoreAdditionalServiceRequest;
use App\Http\Requests\Admin\AdditionalService\UpdateAdditionalServiceRequest;
use App\Models\AdditionalService;
use App\Services\File\FileService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdditionalServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $services = AdditionalService::with('icon')
            ->orderBy('created_at')
            ->paginate(12);

        return view('admin.additional-services.index', [
            'items' => $services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.additional-services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdditionalServiceRequest $request, AdditionalService $additionalService, FileService $fileService): RedirectResponse
    {
        $file = $request->hasFile('icon')
            ? $fileService->setParams($request, 'icon', 'public')->storeFile()->id
            : null;

        $additionalService->fill(array_merge($request->validated(), [
            'icon_id' => $file,
        ]))->save();

        return redirect()->route('admin.additional-services.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdditionalService $additionalService)
    {
        $additionalService->load('icon');

        return view('admin.additional-services.edit', [
            'item' => $additionalService
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdditionalServiceRequest $request, AdditionalService $additionalService, FileService $fileService): RedirectResponse
    {
        $file = $request->hasFile('icon')
            ? $fileService->setParams($request, 'icon')->storeFile($additionalService->icon_id)->id
            : $additionalService->icon_id;

        $additionalService->fill(array_merge($request->all(), [
            'icon_id' => $file
        ]))->save();

        return redirect()->route('admin.additional-services.index');
    }

    /**
     * Function remove icon from file
     *
     * @param AdditionalService $additionalService
     * @param FileService $fileService
     * @return RedirectResponse
     */
    public function destroyIcon(AdditionalService $additionalService, FileService $fileService): RedirectResponse
    {
        $fileService->remove($additionalService->icon);

        return redirect()->route('admin.additional-services.edit', $additionalService);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdditionalService $additionalService, FileService $fileService): RedirectResponse
    {
        $fileService->remove($additionalService->icon);

        $additionalService->delete();

        return redirect()->route('admin.additional-services.index');
    }
}
