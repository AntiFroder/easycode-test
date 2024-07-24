<?php

namespace App\Providers;

use App\Models\ConfirmSetting;
use App\Observers\ConfirmSettingObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        ConfirmSetting::observe(ConfirmSettingObserver::class);
    }
}
