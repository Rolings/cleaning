<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('contact_phone', Setting::findByKey('contact_phone')?->value);
        View::share('contact_email', Setting::findByKey('contact_email')?->value);
        View::share('contact_facebook', Setting::findByKey('contact_facebook')?->value);
        View::share('contact_twitter', Setting::findByKey('contact_twitter')?->value);
        View::share('contact_instagram', Setting::findByKey('contact_instagram')?->value);
        View::share('contact_youtube', Setting::findByKey('contact_youtube')?->value);
        View::share('contact_linkedin', Setting::findByKey('contact_linkedin')?->value);
        View::share('about_title', Setting::findByKey('about_title')?->value);
        View::share('about_description', Setting::findByKey('about_description')?->value);
        View::share('about_limit_description', Setting::findByKey('about_description')?->limit_value);
    }
}
