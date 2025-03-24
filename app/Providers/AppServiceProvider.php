<?php

namespace App\Providers;

use App\Enums\Setting\SettingFieldsEnum;
use App\Helpers\AdminMenu;
use App\Models\{Callback, File, Order, Setting};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Html\Facades\Html;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);

        if (!App::runningInConsole()) {
            View::share($this->getShareViewData());
        }

        $this->configureCommands();
        // $this->configureModels();
    }

    /**
     * @return array
     */
    private function getShareViewData(): array
    {
        $settingsKeys = SettingFieldsEnum::all();

        $settings = Setting::whereIn('key', $settingsKeys)->pluck('value', 'key');
        $aboutImage = Setting::findFileByKey('about_image')?->url;
        $aboutLimitDescription = Setting::findByKey('about_description')?->limit_value ?? null;

        return array_merge($settings->toArray(), [
            'new_callbacks_count'     => Callback::unread()->count(),
            'new_order_count'         => Order::unread()->count(),
            'no_image'                => File::noImage(),
            'no_avatar'               => File::noAvatar(),
            'about_image'             => $aboutImage,
            'about_limit_description' => $aboutLimitDescription
        ]);
    }

    /**
     * @return void
     */
    private function configureCommands(): void
    {
        DB::prohibitDestructiveCommands(
            $this->app->isProduction(),
        );
    }

    /**
     * @return void
     */
    private function configureModels(): void
    {
        Model::shouldBeStrict();
    }
}
