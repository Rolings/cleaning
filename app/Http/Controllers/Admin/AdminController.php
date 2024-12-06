<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admin\StoreUserRequest;
use App\Http\Requests\Admin\Admin\UpdateUserRequest;
use App\Models\User;
use App\Services\File\FileService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = User::admin()->paginate(10);

        return view('admin.admins.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request, User $admin, FileService $fileService): RedirectResponse
    {
        $file = $request->hasFile('avatar')
            ? $fileService->setParams($request, 'avatar', 'public')->storeFile()->id
            : null;

        $admin->fill(array_merge($request->validated(), [
            'avatar_id' => $file,
        ]))->save();

        return redirect()->route('admin.admins.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin): View
    {
        return view('admin.admins.edit', [
            'item' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $admin, FileService $fileService): RedirectResponse
    {
        $file = $request->hasFile('avatar')
            ? $fileService->setParams($request, 'avatar', 'public')->storeFile($admin->avatar_id)->id
            : null;

        if (is_null($request->password)) {
            $request->request->remove('password');
        }

        $admin->fill(array_merge($request->validated(), [
            'avatar_id' => $file,
        ]))->save();

        return redirect()->route('admin.admins.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin, FileService $fileService): RedirectResponse
    {
        $admin->load('image');

        if (!is_null($admin->avatar)) {
            $fileService->remove($admin->avatar);
        }

        $admin->delete();

        return redirect()->route('admin.admins.index');
    }
}
