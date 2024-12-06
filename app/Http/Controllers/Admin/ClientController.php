<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\{StoreUserRequest,UpdateUserRequest};
use App\Models\User;
use App\Services\File\FileService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = User::client()->paginate(10);

        return view('admin.clients.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request, User $client, FileService $fileService): RedirectResponse
    {
        $file = $request->hasFile('avatar')
            ? $fileService->setParams($request, 'avatar', 'public')->storeFile()->id
            : null;

        $client->fill(array_merge($request->validated(), [
            'avatar_id' => $file,
        ]))->save();

        return redirect()->route('admin.clients.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $client): View
    {
        return view('admin.clients.edit', [
            'item' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $client, FileService $fileService): RedirectResponse
    {
        $file = $request->hasFile('avatar')
            ? $fileService->setParams($request, 'avatar', 'public')->storeFile($client->avatar_id)->id
            : $client->avatar_id;

        $client->fill(array_merge($request->validated(), [
            'avatar_id' => $file,
        ]))->save();

        return redirect()->route('admin.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $client, FileService $fileService): RedirectResponse
    {
        $client->load('avatar');

        if (!is_null($client->avatar)) {
            $fileService->remove($client->avatar);
        }

        $client->delete();

        return redirect()->route('admin.clients.index');
    }
}
