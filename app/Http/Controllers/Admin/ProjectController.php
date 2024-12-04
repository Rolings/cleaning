<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\StoreRequest;
use App\Http\Requests\Admin\Project\UpdateRequest;
use Illuminate\Contracts\View\View;
use App\Models\{Project, File};
use App\Services\File\FileService;
use Illuminate\Http\RedirectResponse;
use Laracasts\Utilities\JavaScript\JavaScriptFacade as JavaScript;

class ProjectController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $projects = Project::with(['gallery'])
            ->orderBy('created_at')
            ->paginate(15);

        return view('admin.projects.index', [
            'items' => $projects
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.projects.create');
    }

    /**
     * @param StoreRequest $request
     * @param Project $project
     * @param FileService $fileService
     * @return RedirectResponse
     */
    public function store(StoreRequest $request, Project $project, FileService $fileService): RedirectResponse
    {
        $project->fill($request->validated())->save();

        if ($project && $request->has('slider')) {
            $list = $fileService->setParams($request, 'slider', 'public')->storeFiles();
            $project->gallery()->attach($list->pluck('id'));
        }

        return redirect()->route('admin.projects.index');
    }

    /**
     * @param Project $project
     * @return View
     */
    public function edit(Project $project): View
    {
        $project->load(['gallery']);

        // Include dynamic variable to window
        JavaScript::put([
            'images' => $project->gallery->transform(function ($item) {
                return [
                    'id'  => $item->id,
                    'src' => $item->url
                ];
            }),
        ]);

        return view('admin.projects.edit', [
            'item' => $project
        ]);
    }

    /**
     * @param UpdateRequest $request
     * @param Project $project
     * @param FileService $fileService
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Project $project, FileService $fileService): RedirectResponse
    {
        $project->fill($request->validated())->save();

        // Project has image
        if ($project->gallery()->exists()) {
            // Request has image list
            if ($request->collect('images_id_left')->count()) {
                // Get different from application images list id and request images list id
                $detachItems = $project->gallery->pluck('id')->diff($request->collect('images_id_left'))->values();
                $project->gallery()->detach($detachItems);

                $fileService->removeFiles(File::find($detachItems));
            }
        }

        // Request has new image
        if ($request->has('slider')) {

            $list = $fileService->setParams($request, 'slider', 'public')->storeFiles();

            $project->gallery()->attach($list->pluck('id'));
        }

        return redirect()->route('admin.projects.index');
    }

    /**
     * @param Project $project
     * @param FileService $fileService
     * @return RedirectResponse
     */
    public function destroy(Project $project, FileService $fileService): RedirectResponse
    {
        $project->load('gallery');

        if (!$project->gallery->isEmpty()) {
            $fileService->removeFiles($project->gallery);
        }

        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
