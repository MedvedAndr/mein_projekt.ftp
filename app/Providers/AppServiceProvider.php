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
        //  Регистрация класса App\Services\AssetsRepository для глобального использования
        //      app('assets')
        $this->app->scoped('assets', AssetsRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Инициация бандлов ассетов из файла config/data/assets_bundles.php через класс App\Services\AssetsRepository
        foreach (config('data.assets_bundles') as $bundle_name => $assets_options) {
            app('assets')->setBundle($bundle_name, $assets_options['styles'], $assets_options['scripts']);
        }

        // Подключение глобальных бандлов к странице
        // app('assets')->useBundle('layout');
        // app('assets')->useBundle('form');
        // app('assets')->useBundle('ckeditor');

        // dump(config('data.assets_bundles'));
    }
}
