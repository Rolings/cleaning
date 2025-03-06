<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Contracts\View\View;

class ServiceController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $services = Service::with('image')
            ->onlyActive()
            ->orderBy('id', 'desc')
            ->paginate(6);

        return \view('main.services.index', [
            'services' => $services
        ]);
    }

    /**
     * @return View
     */
    public function show(Service $service): View
    {
        $projects = Project::with(['gallery'])->limit(3)->get();

        $previousService = Service::where('id', '>', $service->id)
            ->orderBy('id')
            ->first();

        $nextService = Service::where('id', '<', $service->id)
            ->orderBy('id', 'desc')
            ->first();

        return \view('main.services.show', [
            'service'         => $service,
            'projects'        => $projects,
            'previousService' => $previousService,
            'nextService'     => $nextService
        ]);
    }
}
