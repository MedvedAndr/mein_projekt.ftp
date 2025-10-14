<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\AssetsRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->scoped('assets', AssetsRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Инициация бандлов
        foreach (config('data.assets_bundles') as $bundle_name => $assets_options) {
            app('assets')->setBundle($bundle_name, $assets_options['styles'], $assets_options['scripts']);
        }

        // app('assets')->useBundle('layout');
        // app('assets')->useBundle('form');
        // app('assets')->useBundle('ckeditor');

        dump(config('data.assets_bundles'));
    }
}
