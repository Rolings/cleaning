<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\File\FileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Enums\Setting\SettingFieldsEnum;
use Illuminate\View\View;


class SettingController extends Controller
{
    /***
     * @return View
     */
    public function index(): View
    {
        $settings = Setting::whereIn('key', SettingFieldsEnum::all())->pluck('value', 'key');

        $aboutImage = Setting::findFileByKey('about_image')?->url;

        return view('admin.settings.index', array_merge($settings->toArray(), [
            'about_image' => $aboutImage
        ]));
    }

    /**
     * @param Request $request
     * @param FileService $fileService
     * @return RedirectResponse
     */
    public function update(Request $request, FileService $fileService): RedirectResponse
    {
        foreach ($request->only(SettingFieldsEnum::all()) as $key => $value) {
            Setting::setByKey($key, $value);
        }

        if ($request->hasFile('about_image')) {
            $value = $fileService
                ->setParams($request, 'about_image')
                ->storeFile(Setting::findByKey('about_image')?->value)->id;

            Setting::setByKey('about_image', $value);
        }

        return redirect()->route('admin.settings.index');
    }
}
