<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Illuminate\Foundation\AliasLoader;
use App\Helpers\AdminMenu;
use Spatie\Html\Facades\Html;
use App\Models\File;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Get the AliasLoader instance
        $loader = AliasLoader::getInstance();

        // Add your aliases
        $loader->alias('AdminMenu', AdminMenu::class);
        $loader->alias('Html', Html::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (!App::runningInConsole()) {
            View::share('no_image', File::NO_IMAGE);
            View::share('contact_phone', Setting::findByKey('contact_phone')?->value);
            View::share('contact_email', Setting::findByKey('contact_email')?->value);
            View::share('contact_address', Setting::findByKey('contact_address')?->value);
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
}
