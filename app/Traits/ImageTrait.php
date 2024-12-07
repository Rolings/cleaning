<?php

namespace App\Traits;

use Illuminate\Foundation\Http\FormRequest;
use App\Services\File\FileService;
use App\Models\User;

trait ImageTrait
{
    private function handleAvatarUpdate(FormRequest $request, FileService $fileService, User $user): ?int
    {
        if ($request->hasFile('avatar')) {
            return $fileService->setParams($request, 'avatar', 'public')
                ->storeFile($user->avatar_id)
                ->id;
        }

        return $user->avatar_id;
    }

}
