<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\File\FileService;
use App\Http\Requests\Admin\Service\{StoreRequest, UpdateRequest};

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('image')
            ->orderBy('created_at')
            ->paginate(15);

        return view('admin.service.index', [
            'items' => $services
        ]);
    }

    public function create()
    {
        return view('admin.service.create');
    }

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


    public function edit(Service $service)
    {
        $service->load('image');

        return view('admin.service.edit', [
            'item' => $service
        ]);
    }

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


    public function destroy(Service $service, FileService $fileService)
    {
        $service->load('image');

        if (!is_null($service->image)) {
            $fileService->remove($service->image);
        }

        $service->delete();

        return redirect()->route('admin.services.index');
    }
}
