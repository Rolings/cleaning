<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.index', [
            'contact_phone'     => Setting::findByKey('contact_phone')?->value,
            'contact_email'     => Setting::findByKey('contact_email')?->value,
            'contact_address'   => Setting::findByKey('contact_address')?->value,
            'contact_facebook'  => Setting::findByKey('contact_facebook')?->value,
            'contact_twitter'   => Setting::findByKey('contact_twitter')?->value,
            'contact_instagram' => Setting::findByKey('contact_instagram')?->value,
            'contact_youtube'   => Setting::findByKey('contact_youtube')?->value,
            'contact_linkedin'  => Setting::findByKey('contact_linkedin')?->value,
            'about_title'       => Setting::findByKey('about_title')?->value,
            'about_description' => Setting::findByKey('about_description')?->value,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        if ($request->has('contact_phone')) {
            Setting::findByKey('contact_phone')->update(['value' => $request->input('contact_phone')]);
        }

        if ($request->has('contact_email')) {
            Setting::findByKey('contact_email')->update(['value' => $request->input('contact_email')]);
        }
        if ($request->has('contact_address')) {
            Setting::findByKey('contact_address')->update(['value' => $request->input('contact_address')]);
        }

        if ($request->has('contact_facebook')) {
            Setting::findByKey('contact_facebook')->update(['value' => $request->input('contact_facebook')]);
        }

        if ($request->has('contact_twitter')) {
            Setting::findByKey('contact_twitter')->update(['value' => $request->input('contact_twitter')]);
        }

        if ($request->has('contact_instagram')) {
            Setting::findByKey('contact_instagram')->update(['value' => $request->input('contact_instagram')]);
        }

        if ($request->has('contact_youtube')) {
            Setting::findByKey('contact_youtube')->update(['value' => $request->input('contact_youtube')]);
        }

        if ($request->has('contact_linkedin')) {
            Setting::findByKey('contact_linkedin')->update(['value' => $request->input('contact_linkedin')]);
        }

        if ($request->has('about_title')) {
            Setting::findByKey('about_title')->update(['value' => $request->input('about_title')]);
        }

        if ($request->has('about_description')) {
            Setting::findByKey('about_description')->update(['value' => $request->input('about_description')]);
        }

        return redirect()->route('admin.settings.index');
    }
}
