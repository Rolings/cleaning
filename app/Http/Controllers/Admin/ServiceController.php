<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            ->orderBy('created_at')
            ->paginate(15);

        return view('admin.services.index', [
            'items' => $services
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.services.create');
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

        return redirect()->route('admin.services.index');
    }

    /**
     * @param Service $service
     * @return View
     */
    public function edit(Service $service): View
    {
        $service->load('image');

        return view('admin.services.edit', [
            'item' => $service
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

        return redirect()->route('admin.services.index');
    }

    /**
     * @param Service $service
     * @param FileService $fileService
     * @return RedirectResponse
     */
    public function destroy(Service $service, FileService $fileService): RedirectResponse
    {
        $service->load('image');

        if (!is_null($service->image)) {
            $fileService->remove($service->image);
        }

        $service->delete();

        return redirect()->route('admin.services.index');
    }
}
