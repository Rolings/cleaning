<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\File\FileService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\Employee\{StoreUserRequest,UpdateUserRequest};
use App\Models\User;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = User::employees()->paginate(10);

        return view('admin.employees.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request, User $employee, FileService $fileService): RedirectResponse
    {
        $file = $request->hasFile('avatar')
            ? $fileService->setParams($request, 'avatar', 'public')->storeFile()->id
            : null;

        $employee->fill(array_merge($request->validated(), [
            'avatar_id' => $file,
        ]))->save();

        return redirect()->route('admin.employees.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $employee): View
    {
        return view('admin.employees.edit', [
            'item' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $employee, FileService $fileService): RedirectResponse
    {
        $file = $request->hasFile('avatar')
            ? $fileService->setParams($request, 'avatar', 'public')->storeFile($employee->avatar_id)->id
            : $employee->avatar_id;

        $employee->fill(array_merge($request->validated(), [
            'avatar_id' => $file,
        ]))->save();

        return redirect()->route('admin.employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $employee, FileService $fileService): RedirectResponse
    {
        $employee->load('avatar');

        if (!is_null($employee->avatar)) {
            $fileService->remove($employee->avatar);
        }

        $employee->delete();

        return redirect()->route('admin.employees.index');
    }
}
