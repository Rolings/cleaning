<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdditionalService;
use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\File\FileService;
use App\Http\Requests\Admin\Service\{StoreRequest, UpdateRequest};

class ServiceController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $services = Service::with('image')
            ->orderBy('id','desc')
            ->paginate(12);

        return view('admin.services.index', [
            'items' => $services
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

        return view('admin.services.create', [
            'additionalServices' => $additionalServices
        ]);
    }

    /**
     * @param StoreRequest $request
     * @param Service $service
     * @param FileService $fileService
     * @return RedirectResponse
     */
    public function store(StoreRequest $request, Service $service, FileService $fileService): RedirectResponse
    {
        $file = $request->hasFile('image')
            ? $fileService->setParams($request, 'image', 'public')->storeFile()->id
            : null;

        $service->fill(array_merge($request->validated(), [
            'image_id' => $file,
        ]))->save();

        if ($request->has('additional')) {
            $service->additional()->sync($request->additional);
        }

        return redirect()->route('admin.services.index');
    }

    /**
     * @param Service $service
     * @return View
     */
    public function edit(Service $service): View
    {
        $service->load(['image','additional']);

        $additionalServices = AdditionalService::onlyActive()->get();

        return view('admin.services.edit', [
            'item'               => $service,
            'additionalServices' => $additionalServices
        ]);
    }

    /**
     * @param UpdateRequest $request
     * @param Service $service
     * @param FileService $fileService
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Service $service, FileService $fileService): RedirectResponse
    {
        $file = $request->hasFile('image')
            ? $fileService->setParams($request, 'image', 'public')->storeFile($service->image_id)->id
            : $service->image_id;

        $service->fill(array_merge($request->all(), [
            'image_id' => $file
        ]))->save();

        if ($request->has('additional')) {
            $service->additional()->sync($request->additional);
        }

        return redirect()->route('admin.services.index');
    }

    /**
     * @param Service $service
     * @param FileService $fileService
     * @return RedirectResponse
     */
    public function destroy(Service $service, FileService $fileService): RedirectResponse
    {
        $fileService->remove($service->image);

        $service->delete();

        return redirect()->route('admin.services.index');
    }
}
