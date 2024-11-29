<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\StoreRequest;
use App\Http\Requests\Admin\Project\UpdateRequest;
use App\Models\Project;
use App\Services\File\FileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['mainPhoto'])
            ->orderBy('created_at')
            ->paginate(15);

        return view('admin.projects.index', [
            'items' => $projects
        ]);
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(StoreRequest $request, Project $project, FileService $fileService): RedirectResponse
    {
        $file = $request->hasFile('image')
            ? $fileService->setParams($request, 'image', 'public')->storeFile()->id
            : null;

        $project->fill(array_merge($request->validated(), [
            'image_id' => $file,
        ]))->save();

        return redirect()->route('admin.projects.index');
    }


    public function edit(Project $project)
    {
        $project->load(['mainPhoto','gallery']);

        return view('admin.projects.edit', [
            'item' => $project
        ]);
    }

    public function update(UpdateRequest $request, Project $project, FileService $fileService): RedirectResponse
    {
        $file = $request->hasFile('image')
            ? $fileService->setParams($request, 'image', 'public')->storeFile($project->image_id)->id
            : $project->image_id;

        $project->fill(array_merge($request->all(), [
            'image_id' => $file
        ]))->save();

        return redirect()->route('admin.projects.index');
    }


    public function destroy(Project $project, FileService $fileService)
    {
        $project->load('image');

        if (!is_null($project->image)) {
            $fileService->remove($project->image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
